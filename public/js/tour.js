var tour = new Tour({

    keyboard: true,
    backdrop: true,

    steps: [
        {
            element: "#home",
            title: "Menu Home",
            content: "Em <strong>HOME</strong>, vocë poderá acessar diretamente cada módulos é também ver informações como: <br>" +
            "<li>Quantidade de Artigos</li>" +
            "<li>Quantidade de Usuários</li>" +
            "<li>Quantidade de Eventos</li>" +
            "entre outras informações. ",


        },
        {
            element: "#artigo",
            title: "Menu Artigos",
            content: "Em Artigos você podera criar novos Posts para o site. Nele contera opões para relacionar com <strong>DEPARTAMENTO</strong> em que o artígo seja especifico ou não para um certo departamento .Também encontrara opções como <strong>STATUS</strong> e <strong>IMAGENS</strong>, tornando o artígo mais agradável",

        },
        {
            element: "#departamento",
            title: "Menu Departamento",
            content: "Nesse módulo, você poderar acrecentar departamento da igreja que ainda não existe. Editar departamento que foram mudados de nome ou nomenclatura e excluir com facilidade."
        },
        {
            element: "#avisos",
            title: "Menu Quadro de Avisos",
            content: "Em Quadro de Avisos, você pode marcar reuniões, deixar avisos em geral. Nesse módulo você encontrara opções como dia da semana para mostrar dinamicamente o dia que sera marcado a reunião, ensaio, ou marcar como <strong>GERAL</strong>, que significa que não tera dia, e que simplismente sera um aviso genérico."
        },
        {
            element: "#membros",
            title: "Menu Membros",
            content: "A muito tempo a Igreja de Deus em Luziânia vem cadastranto e tendo o controle de membros por fichas. Nesse módulo poderão cadastrar o membro da igreja no mesmo formato da ficha original. Existe uma opçoes como <strong>CPF</strong>," +
            " que permitira adiantar o cadastro digitando um CPF válido. Com as Fotos dos membros cadastrados em sua ficha, no dia do seu aniversário no site motrara a foto do membro e parabenizando-o."
        },
        {
            element: "#album",
            title: "Menu Album",
            content: "Em um evento é sempre bom lembrarmos com imagens para deixar registrado momentos de confraternização. Nesse módulo você facilmente podera criar albuns e dentro de cada album as imaagens do album. <br/>" +
            "Exemplo: Suponhamos que tivemos um evento em nossa igreja chamado Congresso Jeans. Então podemos criar o album chamado Congresso Jeans adicionando informações pertinentes e tribuindo imangens dentro do album."
        },
        {
            element: "#slids",
            title: "Menu Slids",
            content: "Sempre temos algo para mostrar em formato de imagens. Nesse menu podemos criar slids para podermos através das imagens colocar os dias importantes da igreja. Como dias da semana que tera cultos, folders, entre outras."
        },
        {
            element: "#download",
            title: "Menu Download",
            content: "Sempre precisamos passar para os alunos da IDB materiais didáticos para aperfeiçoramos no entendimento da palavra. Aqui poderemos fazer o upload do seu PDF para que baixem e estudem em casa ou no seu celular. Assim poderemos ter mais eficiência no distribuição em massa." +
            "<br/> Nesse Módulo também temos uma opção chamado <strong>PEGA LINK</strong>. Clicando sobre o botão você poderá pegar o link que ira redirecionar para o download. Mais para que isso sera necessário?<br/>" +
            "Suponhamos que você esteja escrevendo um artigo com um titulo relacionado ao APOCALIPSE. Então no seu texto podera conter um texto onde indicara o link do PDF do estudo escrito para donwload.<br/> EX:<br/>" +
            "Clique <a href='#'>aqui</a> para fazer o download do estudo de apocalipse parte 1."
        },
        {
            element: "#eventos",
            title: "Menu Eventos",
            content: "Nesse módulo podera ser criado eventos. Nesse menu terá dois submenus, onde um é para texto agregado com a opção de <strong>SLIDS</strong> e eventos em vídeos que são chamados diretamente do YouTube.<br/> " +
            "No link do menu eventos em texto você encontrara opção como:<br/>" +
            "<ul><li>Data de Início do evento</li><li>Data do fim do evento</li><li>Opção para adcionar no <strong>SLIDS</strong></li><li>Horário que começara o evento</li><li>Dia da semana</li><li>Local do evento</li></ul> Entre outras opções como expirar automaticamente o evento depois do termino baseado na data final do evento"
        },
        {
            element: "#youtube",
            title: "Menu Youtube",
            content: "Hoje em dia quem não gosta de um bom vídeo bem editado? Nessa opção podemos colcar videos no site pegando os vídeos vinculados ao Youtube. Assim podemos gravar gincanas, pregações, eventos, cultos especiais ... "
        },
        {
            element: "#sound",
            title: "Menu Sound Cloud",
            content: "Nesse módulo, podemos adcionar gravações de sons do grupo de louvor, das senhoras, dos senhores, do coral.. Sendo adcionada em uma conta no Sound Cloud e vinculando em nossa págica. Simples é fácil."
        },
        {
            element: "#pedido",
            title: "Menu Pedido de Oração",
            content: "Nesse módulo, podemos visualizar os pedidos de oração que foram feitos por usuário no site."
        },

        {
            element: "#grafico",
            title: "Menu Gráfico",
            content: "Em Gráficos podemos ver com mais clareza quantas postagem fizemos no mês, no ano com base em números de visualização e quantidade de artigo por usuário. Com submenus você tera muitas opções para analize como: <br/>" +
            "<ul><li>Qauntidade de artigo nos últimos 30 dias</li><li>Quantidade de artigos por mês</li><li>Gráfico com quantidade de visualização e quantidade de artigo</li><li>Quantidade de artigos de todos os usuários com suas porcentagens</li></ul>" +
            "Dessa forma, podemos ter retorno de visualização e quais artigos são mais agradáveis para os usuários"
        },
        {
            element: "#contato",
            title: "Menu Contato",
            content: "Nesse menu, podeveremos visualizar os contatos que foram feitos por usuários para cantactar com a igreja. Quando o usuário contacta a igreja por meio de um formulário disponivel no site, o sistema manda um email para o usuário agradecendo pelo contato feito e que entraremos em contato em breve"
        },
        {
            element: "#sinoNotificacao",
            title: "Notificação dos contatos",
            content: "Aqui podemos receber notificaões dos contatos que o usuário fez com a igreja. Visualizando o contato e tendo informações como:<br/>" +
            "<ul><li>Nome</li><li>E-Mail</li><li>Telefone</li></ul> Assim podemos respode-lo com mais eficiencia em nossa caixa de correio.",
            placement: "bottom",
        },
        {
            element: "#perfil",
            title: "Menu Perfil",
            content: "Em seu perfil, podemos mudar foto do usuário que sera apresentado no site em seus artigos. Podemos também modificar senhas, cadastrar  biografia , fazer logoff do sistema, entre outas.",
            placement: "bottom",
        },


    ]});