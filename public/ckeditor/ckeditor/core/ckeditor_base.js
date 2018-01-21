/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

/**
 * @fileOverview Contains the first and essential part of the {@link CKEDITOR}
 *		object definition.
 */

// #### Compressed Code
// Compressed code in ckeditor.js must be be updated on changes in the script.
// The Closure Compiler online service should be used when updating this manually:
// http://closure-compiler.appspot.com/

// #### Raw code
// ATTENTION: read the above "Compressed Code" notes when changing this code.

if ( !window.CKEDITOR ) {
	/**
	 * This is the API entry point. The entire CKEditor code runs under this object.
	 * @class CKEDITOR
	 * @singleton
	 */
	window.CKEDITOR = ( function() {
		var basePathSrcPattern = /(^|.*[\\\/])ckeditor\.js(?:\?.*|;.*)?$/i;

		var CKEDITOR = {

			/**
			 * A constant string unique for each release of CKEditor. Its value
			 * is used, by default, to build the URL for all resources loaded
			 * by the editor code, guaranteeing clean cache results when
			 * upgrading.
			 *
			 * **Note:** There is [a known issue where "icons.png" does not script
			 * timestamp](http://dev.ckeditor.com/ticket/10685) and might get cached.
			 * We are working on having it fixed.
			 *
			 *		alert( CKEDITOR.timestamp ); // e.g. '87dm'
			 */
			timestamp: '',				// %REMOVE_LINE%
			/*							// %REMOVE_LINE%
			// The production implementation contains a fixed timestamp, unique
			// for each release and generated by the releaser.
			// (Base 36 value of each component of YYMMDDHH - 4 chars total - e.g. 87bm == 08071122)
			timestamp: '%TIMESTAMP%',
			// %REMOVE_LINE% */

			/**
			 * Contains the CKEditor version number.
			 *
			 *		alert( CKEDITOR.version ); // e.g. 'CKEditor 3.4.1'
			 */
			version: '%VERSION%',

			/**
			 * Contains the CKEditor revision number.
			 * The revision number is incremented automatically, following each
			 * modification to the CKEditor source code.
			 *
			 *		alert( CKEDITOR.revision ); // e.g. '3975'
			 */
			revision: '%REV%',

			/**
			 * A 3-digit random integer, valid for the entire life of the CKEDITOR object.
			 *
			 *		alert( CKEDITOR.rnd ); // e.g. 319
			 *
			 * @property {Number}
			 */
			rnd: Math.floor( Math.random() * ( 999 /*Max*/ - 100 /*Min*/ + 1 ) ) + 100 /*Min*/,

			/**
			 * Private object used to hold core stuff. It should not be used outside of
			 * the API code as properties defined here may change at any time
			 * without notice.
			 *
			 * @private
			 */
			_: {
				pending: [],
				basePathSrcPattern: basePathSrcPattern
			},

			/**
			 * Indicates the API loading status. The following statuses are available:
			 *
			 * * **unloaded**: the API is not yet loaded.
			 * * **basic_loaded**: the basic API features are available.
			 * * **basic_ready**: the basic API is ready to load the full core code.
			 * * **loaded**: the API can be fully used.
			 *
			 * Example:
			 *
			 *		if ( CKEDITOR.status == 'loaded' ) {
			 *			// The API can now be fully used.
			 *			doSomething();
			 *		} else {
			 *			// Wait for the full core to be loaded and fire its loading.
			 *			CKEDITOR.on( 'load', doSomething );
			 *			CKEDITOR.loadFullCore && CKEDITOR.loadFullCore();
			 *		}
			 */
			status: 'unloaded',

			/**
			 * The full URL for the CKEditor installation directory.
			 * It is possible to manually provide the base path by setting a
			 * global variable named `CKEDITOR_BASEPATH`. This global variable
			 * must be set **before** the editor script loading.
			 *
			 *		alert( CKEDITOR.basePath ); // e.g. 'http://www.example.com/ckeditor/'
			 *
			 * @property {String}
			 */
			basePath: ( function() {
				// Find out the editor directory path, based on its <script> tag.
				var path = window.CKEDITOR_BASEPATH || '';

				if ( !path ) {
					var scripts = document.getElementsByTagName( 'script' );

					for ( var i = 0; i < scripts.length; i++ ) {
						var match = scripts[ i ].src.match( basePathSrcPattern );

						if ( match ) {
							path = match[ 1 ];
							break;
						}
					}
				}

				// In IE (only) the script.src string is the raw value entered in the
				// HTML source. Other browsers return the full resolved URL instead.
				if ( path.indexOf( ':/' ) == -1 && path.slice( 0, 2 ) != '//' ) {
					// Absolute path.
					if ( path.indexOf( '/' ) === 0 )
						path = location.href.match( /^.*?:\/\/[^\/]*/ )[ 0 ] + path;
					// Relative path.
					else
						path = location.href.match( /^[^\?]*\/(?:)/ )[ 0 ] + path;
				}

				if ( !path )
					throw 'The CKEditor installation path could not be automatically detected. Please set the global variable "CKEDITOR_BASEPATH" before creating editor instances.';

				return path;
			} )(),

			/**
			 * Gets the full URL for CKEditor resources. By default, URLs
			 * returned by this function contain a querystring parameter ("t")
			 * set to the {@link CKEDITOR#timestamp} value.
			 *
			 * It is possible to provide a custom implementation of this
			 * function by setting a global variable named `CKEDITOR_GETURL`.
			 * This global variable must be set **before** the editor script
			 * loading. If the custom implementation returns nothing (`==null`), the
			 * default implementation is used.
			 *
			 *		// e.g. 'http://www.example.com/ckeditor/skins/default/editor.css?t=87dm'
			 *		alert( CKEDITOR.getUrl( 'skins/default/editor.css' ) );
			 *
			 *		// e.g. 'http://www.example.com/skins/default/editor.css?t=87dm'
			 *		alert( CKEDITOR.getUrl( '/skins/default/editor.css' ) );
			 *
			 *		// e.g. 'http://www.somesite.com/skins/default/editor.css?t=87dm'
			 *		alert( CKEDITOR.getUrl( 'http://www.somesite.com/skins/default/editor.css' ) );
			 *
			 * @param {String} resource The resource whose full URL we want to get.
			 * It may be a full, absolute, or relative URL.
			 * @returns {String} The full URL.
			 */
			getUrl: function( resource ) {
				// If this is not a full or absolute path.
				if ( resource.indexOf( ':/' ) == -1 && resource.indexOf( '/' ) !== 0 )
					resource = this.basePath + resource;

				// Add the timestamp, except for directories.
				if ( this.timestamp && resource.charAt( resource.length - 1 ) != '/' && !( /[&?]t=/ ).test( resource ) )
					resource += ( resource.indexOf( '?' ) >= 0 ? '&' : '?' ) + 't=' + this.timestamp;

				return resource;
			},

			/**
			 * Specify a function to execute when the DOM is fully loaded.
			 *
			 * If called after the DOM has been initialized, the function passed in will
			 * be executed immediately.
			 *
			 * @method
			 * @todo
			 */
			domReady: ( function() {
				// Based on the original jQuery code (available under the MIT license, see LICENSE.md).

				var callbacks = [];

				function onReady() {
					try {
						// Cleanup functions for the document ready method
						if ( document.addEventListener ) {
							document.removeEventListener( 'DOMContentLoaded', onReady, false );
							executeCallbacks();
						}
						// Make sure body exists, at least, in case IE gets a little overzealous.
						else if ( document.attachEvent && document.readyState === 'complete' ) {
							document.detachEvent( 'onreadystatechange', onReady );
							executeCallbacks();
						}
					} catch ( er ) {}
				}

				function executeCallbacks() {
					var i;
					while ( ( i = callbacks.shift() ) )
						i();
				}

				return function( fn ) {
					callbacks.push( fn );

					// Catch cases where this is called after the
					// browser event has already occurred.
					if ( document.readyState === 'complete' )
						// Handle it asynchronously to allow scripts the opportunity to delay ready
						setTimeout( onReady, 1 );

					// Run below once on demand only.
					if ( callbacks.length != 1 )
						return;

					// For IE>8, Firefox, Opera and Webkit.
					if ( document.addEventListener ) {
						// Use the handy event callback
						document.addEventListener( 'DOMContentLoaded', onReady, false );

						// A fallback to window.onload, that will always work
						window.addEventListener( 'load', onReady, false );

					}
					// If old IE event model is used
					else if ( document.attachEvent ) {
						// ensure firing before onload,
						// maybe late but safe also for iframes
						document.attachEvent( 'onreadystatechange', onReady );

						// A fallback to window.onload, that will always work
						window.attachEvent( 'onload', onReady );

						// If IE and not a frame
						// continually check to see if the document is ready
						// use the trick by Diego Perini
						// http://javascript.nwbox.com/IEContentLoaded/
						var toplevel = false;

						try {
							toplevel = !window.frameElement;
						} catch ( e ) {}

						if ( document.documentElement.doScroll && toplevel ) {
							scrollCheck();
						}
					}

					function scrollCheck() {
						try {
							document.documentElement.doScroll( 'left' );
						} catch ( e ) {
							setTimeout( scrollCheck, 1 );
							return;
						}
						onReady();
					}
				};

			} )()
		};

		// Make it possible to override the "url" function with a custom
		// implementation pointing to a global named CKEDITOR_GETURL.
		var newGetUrl = window.CKEDITOR_GETURL;
		if ( newGetUrl ) {
			var originalGetUrl = CKEDITOR.getUrl;
			CKEDITOR.getUrl = function( resource ) {
				return newGetUrl.call( CKEDITOR, resource ) || originalGetUrl.call( CKEDITOR, resource );
			};
		}

		return CKEDITOR;
	} )();
}

/**
 * Function called upon loading a custom configuration file that can
 * modify the editor instance configuration ({@link CKEDITOR.editor#config}).
 * It is usually defined inside the custom configuration files that can
 * script developer defined settings.
 *
 *		// This is supposed to be placed in the config.js file.
 *		CKEDITOR.editorConfig = function( config ) {
 *			// Define changes to default configuration here. For example:
 *			config.language = 'fr';
 *			config.uiColor = '#AADC6E';
 *		};
 *
 * @method editorConfig
 * @param {CKEDITOR.config} config A configuration object containing the
 * settings defined for a {@link CKEDITOR.editor} instance up to this
 * function call. Note that not all settings may still be available. See
 * [Configuration Loading Order](http://docs.cksource.com/CKEditor_3.x/Developers_Guide/Setting_Configurations#Configuration_Loading_Order)
 * for details.
 */

// PACKAGER_RENAME( CKEDITOR )
