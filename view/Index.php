<!--
/*
    Author     : MichaelDydean
    Desde 26/05/2016.
*/
-->
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type = "image/png" rel = "icon" href = "_imagem/ico_logoP.png" id = "icone" />


        <title> Fórum </title>

        <link rel="stylesheet" href="_css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
            p {
                text-align: justify;
            }
            #div_descrisao {
                display: none;
                background: url('_imagem/img-reuniao.png') no-repeat;
            }
            #txt_descrisao {
                display: none;
                margin-left: 30vw;
            }
            #id_img_ap {


            }
            #apresentacao_posts_coments {
                margin-left: 8vw;
            }
        </style>
        <link rel="stylesheet" href="_css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="_css/main.css">
        <link rel="stylesheet" href="_css/modelo_index.css">
        <link rel="stylesheet" href="_css/modelo_posts.css">
        <link rel="stylesheet" href="_css/modelo_comentarios.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div id="toggle" class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <hgroup id='logo_slide'>

                        <h1>F<span id = "titulo_forum">órum</span></h1>
                        <h2>de debates de questões especificas</h2>

                    </hgroup>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="form" method = 'post' action = '../model/Validacao_Usuario.php'>
                        <div class="form-group">
                            <input id="i_email" type="text" placeholder="Email" name="valid_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="i_password" type="password" placeholder="Password" name="valid_senha" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success" name="validar">Sign in</button>
                        <p id="link_cadastro">
                            <a href="Cadastro.html">fazer cadastro</a>
                        </p>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
        <!-- formulário de busca -->
        <form name = 'searchform' id = 'form_busca' method="post" action="Result_Busca_Posts.php">

            <input type = 'search' name = 'buscar' id = 'buscar_txt' placeholder = 'fazer busca sobre...' required />
            <input type = 'submit' id = 'btn_busca' name="btn-buscar" value = '     ' />

        </form>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div id="quadro_apresentacao" class="jumbotron">
            <div class="container">
                <h1>&nbsp;</h1>
                <p>
                    &nbsp;Inicie, continue, pesquise um debate ou discussão sobre algum tema
                    de seu interesse. <br/>Seja bem-vindo ao fórum.
                </p>
                <div id="div_descrisao">
                    <p id="txt_descrisao">

                        &nbsp;O objetivo do fórum de debates é prover conversas, espaço para 
                        opiniões de varios internautas que buscam, querem compartilhar
                        ou se encontram em dúvida de algum assusto específico e deseja
                        compartilhar.
                        <br/><br/>
                        &nbsp;A proposta é unir esse conjunto e deixar fluir as ideias, pensamentos,
                        questionamentos, enfim, a discussão.
                    </p>
                </div>
                <p><a id="btn_ler_mais" class="btn btn-primary btn-lg" onclick="javascript:document.getElementById('txt_descrisao').style.display = 'block';document.getElementById('div_descrisao').style.display = 'block';document.getElementById('btn_ler_mais').style.display = 'none';" role="button">Ler mais &raquo;</a></p>
            </div>
        </div>

        <div class="container">

            <div id="apresentacao_posts_coments" class="row">

                <?php
                include '../model/Connection.php';
                include '../model/Post_DAO.php';
                include '../model/Comentario_DAO.php';

                $post = new Post_DAO($conexao);

                 $row = $post->get_post_num_ordenado();

                if ($row > 0) {

                    //posts

                    $array_posts = $post->get_post_ordenado();

                    $valor_limite = 3;

                    include '../controller/Corpo_Postagem.php';
                } else {
                    echo '<div id = "texto_nao">Ainda não houve postagens, seja o primeiro!.</div>';
                }
                ?>

            </div>

            <hr>

            <footer id = "rodape" >

                <br/>

                <p>

                    <del>MichaelDydean&copy;2023</del>

                </p>

            </footer>

        </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="_js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="_js/vendor/bootstrap.min.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
                    (function (b, o, i, l, e, r) {
                        b.GoogleAnalyticsObject = l;
                        b[l] || (b[l] =
                                function () {
                                    (b[l].q = b[l].q || []).push(arguments)
                                });
                        b[l].l = +new Date;
                        e = o.createElement(i);
                        r = o.getElementsByTagName(i)[0];
                        e.src = '//www.google-analytics.com/analytics.js';
                        r.parentNode.insertBefore(e, r)
                    }(window, document, 'script', 'ga'));
                    ga('create', 'UA-XXXXX-X', 'auto');
                    ga('send', 'pageview');
        </script>
        <script>
            function addFormCom() {
                // alert("Função indiponível no momento !");
                var codigo = "<form name = 'Comentario' method = 'post' action = 'insertconnectioncomentario.php'><fieldset id = 'comentario_forum'><legend>Comentário</legend><br/><fieldset id = 'foto_forum'><p><div id = 'foto_usu_cadastro'></div><input type = 'file' name = 'foto_N' id = 'foto_I'  onchange = 'mudaFoto()' required /></p></fieldset><p><label for = 'nome_id'>Nome:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type ='text' id = 'nome_id' class = 'dado_comentario' name = 'nome' maxlength = '50' placeholder = 'nome completo' autofocus required /></p><br/><p><label for = 'email_id'>E-Mail:&nbsp;&nbsp;</label><input type = 'email' id = 'email_id' class = 'dado_comentario' name = 'email' maxlength = '40' placeholder = 'nome_email@servidor.com' required /></p><br/><br/><p><label for = 'txtA_id'>mensagem:</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea id = 'txtA_id' name = 'textA' maxlength = '600' required ></textarea></p><input type = 'hidden' name = 'identificacao' value = 'comentario' /><input type = 'submit' value = 'comentar' class = 'btn' /></fieldset></form><br />";
                document.getElementById("comentar").innerHTML = codigo;
            }
        </script>
    </body>
</html>

