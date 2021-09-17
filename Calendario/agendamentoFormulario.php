<?php
include_once 'C:/xampp/htdocs/Calendario/controller/agendamentoController.php';
include_once 'C:/xampp/htdocs/Calendario/dao/daoAgendamento.php';
include_once 'C:/xampp/htdocs/Calendario/model/agendamento_model.php';

$dt = new Agendamento();
$dts = new AgendamentoController();

include_once 'C:/xampp/htdocs/Calendario/model/mensagem.php';
$msg = new Mensagem();

include_once 'C:/xampp/htdocs/Calendario/controller/servicos_has_funcionariosController.php';
include_once 'C:/xampp/htdocs/Calendario/model/servicos_has_funcionarios.php';
$sev = new Servicos_has_funcionarios();


$s_has_f = new Servicos_has_funcionariosController();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width. initial-scale=1.0">
    <title>💈 Barbearia Neves 💈</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/Estilo_Calend.css">
    <link rel="stylesheet" href="/css/Style-Agend.css">

    <!-- CSS only -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="sorcut icon" href="./img/LogoGuia.png" type="image/png" style="width: 16px; height: 16px;">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="Js/sweetalert2.all.min.js"></script>

    <!-- JavaScript Para Funções da Página -->

    <script>
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i)

            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }
    </script>

    <Style>
        form.cadastro label {
            font-weight: border;
            font-size: 20px;
        }
    </Style>

<body>
    <header>
        <a href="./index.html" class="logo">Barbearia Neves<span>.</span></a>
        <div class="menuToggle" onclick=" toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="#banner" onclick=" toggleMenu();">Home</a></li>
            <li><a href="#about" onclick=" toggleMenu();">Sobre</a></li>
            <li><a href="#menu" onclick=" toggleMenu();">Cortes</a></li>
            <li><a href="#salao" onclick=" toggleMenu();">Salão</a></li>
            <li><a href="#feedbacks" onclick=" toggleMenu();">Feedbacks</a></li>
            <li><a href="#contato" onclick=" toggleMenu();">Contato</a></li>
        </ul>
    </header>

    <?php
    $defaultTimeZone = 'UTC';
    if (date_default_timezone_get() != $defaultTimeZone) date_default_timezone_set($defaultTimeZone);

    function _dateAtual($format = "r", $timestamp = false, $timezone = false)
    {
        $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
        $gmtTimezone = new DateTimeZone('GMT');
        $myDateTime = new DateTime(($timestamp != false ? date("r", (int)$timestamp) : date("r")), $gmtTimezone);
        $offset = $userTimezone->getOffset($myDateTime);
        return date($format, ($timestamp != false ? (int)$timestamp : $myDateTime->format('U')) + $offset);
    }
    $dateEscolhida = _dateAtual("Y-m-d", false, 'America/Sao_Paulo');

    if (isset($_POST['enviar'])) {
        $dataA = $_POST['data_agendamento'];
        if ($dataA < $dateEscolhida) {
    ?>
            <script>
                Swal.fire({
                    title: 'Cadastro não realizado!',
                    text: 'O dia escolhido não pode ser agendado antes do dia atual (<?php echo $dateEscolhida ?>)!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            </script>
    <?php
        } else {
            $horario = $_POST['escolherHorario'];
            if ($horario != "") {
                $dataA = $_POST['data_agendamento'];
                $dts = new AgendamentoController();
                unset($_POST['enviar']);
                $msg = $dts->inserirDataAgendamento($dataA, $horario);
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                        URL='http://localhost/Calendario/agendamentoFormulario.php'\">";
            }
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $shsf = new Servicos_has_funcionariosController();
        $sf = $shsf->pesquisarFuncionariosId($id);
    }

    session_start();
    $data = $_SESSION['data'];
    ?>

    <form method="post" action="" class="agendamento" id="agendamento">
        <div class="card-body" style="border: 2px solid #000000; background-color: #333;">
            <div class="card-header tituloAgend">
                Escolha entre os serviços Masculinos ou Femininos
            </div><br>
            <section class="season2-ryzen5">
                <div class="img-s2">
                    <div class="text-ryzen5">
                        <h2></h2>
                        <div class="row escolhaSexo">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-10 offset-2">
                                        <a >
                                            <button type="button" class="masculino" onclick="fechar('r5')">
                                               Masculino</button></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-7 offset-5">
                                        <label class="text-center">____</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12 offset-xxl-1">
                                        <button type="button" class="feminino" onclick="fechar('rFemin')">Feminino</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>

                    <div id="r5" class="hidden5">
                        <div class="mostrar-011">

                            <div class="col-12 " style="margin-bottom: 25px;">
                                <div class="card-header text-start text-dark" style="background-color: rgb(255, 255, 255);">
                                    <div class="row">
                                        <div class="col-md-4 offset-4 funcionario">
                                            <label style="padding: 5px; font-size: 18px;"><strong>Funcionário</strong></label>
                                            <select name="cor" class="form-control">
                                                <option name="cor">Funcionario(1)</option>
                                                <option name="cor">Funcionario(2)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="background-color: rgb(255, 255, 255);">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <img class="salaoMasculino" src="img/corteMasculino.jpg">
                                            <div>
                                                <label style="padding: 5px; font-size: 18px;"><strong>Salão
                                                        Masculino</strong></label>
                                                <label class="cliqueAqui" style="color: black; position: relative; font-size: 14px; margin-left: 5px;">
                                                    Clique aqui.&#9660;</label>
                                                <select name="cor" class="form-control">
                                                    <option>[--Nenhum Serviço--]</option>
                                                    <option name="cor">Serviço(1)</option>
                                                    <option name="cor">Serviço(2)</option>
                                                    <option name="cor">Serviço(3)</option>
                                                    <option name="cor">Serviço(4)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <img class="combosMasc" src="img/como-aparar-a-barba-02.jpg">
                                            <div>
                                                <label style="padding: 5px; font-size: 18px;"><strong>Combos Masc.</strong></label>
                                                <label class="cliqueAqui" style="color: black; position: relative; font-size: 14px; margin-left: 5px;">
                                                    Clique aqui.&#9660;</label>
                                                <select name="Perfil" class="form-control">
                                                    <option>[--Nenhum Serviço--]</option>
                                                    <option name="cor">Serviço(1)</option>
                                                    <option name="cor">Serviço(2)</option>
                                                    <option name="cor">Serviço(3)</option>
                                                    <option name="cor">Serviço(4)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="rFemin" class="hidden5">
                        <div class="mostrar-011">

                            <div class="col-12 " style="margin-bottom: 25px;">
                                <div class="card-header text-start text-dark" style="background-color: rgb(255, 255, 255);">
                                    <div class="row">
                                        <div class="col-md-4 offset-4 funcionario">
                                            <label style="padding: 5px; font-size: 18px;"><strong>Funcionário</strong></label>
                                            <select name="cor" class="form-control">
                                                <option name="cor">Funcionario(1)</option>
                                                <option name="cor">Funcionario(2)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row" style="background-color: rgb(255, 255, 255);">
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <img class="belezaFeminina" src="img/manicure-de-sucesso.jpg">
                                            <div>
                                                <label style="padding: 5px; font-size: 18px;"><strong>Beleza
                                                        Feminina</strong></label>
                                                <label class="cliqueAqui" style="color: black; position: relative; font-size: 14px; margin-left: 5px;">
                                                    Clique aqui.&#9660;</label>
                                                <select name="Perfil" class="form-control">
                                                    <option>[--Nenhum Serviço--]</option>
                                                    <option name="cor">Serviço(1)</option>
                                                    <option name="cor">Serviço(2)</option>
                                                    <option name="cor">Serviço(3)</option>
                                                    <option name="cor">Serviço(4)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span style="color: transparent">.</span>
            </section>

            <div id="modar3">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="row formulario">
                    <!-- Lado esquerdo do Formulário 2prt -->
                    <div class="col-md-6 p-4">
                        <div class="campoForm2">
                            <label for="nome">Nome/Usuário: </label><br>
                            <input type="text" id="nome" name="nome" value="testeNome" disabled><br>
                        </div>
                        <div class="campoForm2">
                            <label for="telefone">Telefone: </label><br>
                            <input type="text" id="telefone" name="telefone" value="testTelefone" disabled><br>
                        </div>
                        <div class="campoForm2">
                            <label for="email">E-mail: </label><br>
                            <input type="text" id="email" name="email" value="testeEmail20@gmail.com" disabled><br>
                        </div>
                    </div>

                    <!-- Lado direito do Formulário 2prt -->

                    <div class="col-md-6 p-4">
                        <div class="campoForm2">
                            <div class="barreira"></div>
                            <Label>Data de Agendamento:</Label><br>
                            <input type="text" name="data_agendamento" value="<?php echo $data ?>">
                        </div>

                        <div class="campoForm2">
                            <Label>Funcionario:</Label><br>
                            <input type="text" name="servico" id="servico" value="Fulano Guilherme" disabled>
                        </div>

                        <div class="campoForm2">
                            <Label>Serviço Escolhido:</Label><br>
                            <input type="text" name="servico" id="servico" value="Serviço(4)" disabled>
                        </div>
                        <div class="campoForm2">
                            <Label>Agendar horário do Serviço:</Label><br>
                            <div class="row">
                                <div class="col-md-10">
                                    <select name="escolherHorario" class="form-control" required>
                                        <option>[--Selecione--]</option>
                                        <option name="cor">08:30</option>
                                        <option name="cor">09:15</option>
                                        <option name="cor">10:45</option>
                                        <option name="cor">11:10</option>
                                        <option name="cor">11:40</option>
                                        <option name="cor">14:00</option>
                                        <option name="cor">14:20</option>
                                        <option name="cor">15:00</option>
                                        <option name="cor">15:30</option>
                                        <option name="cor">16:15</option>
                                        <option name="cor">16:50</option>
                                        <option name="cor">17:30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer" style="background-color: #fff;">
                        <button type="submit" class="btn efeito-btn" name="enviar" id="enviar">Fazer agendamento</button>
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <link rel="stylesheet" href="./css/Style-Agend.css">
    <script src="Js/Agendamento.js"></script>
    <script src="Js/Calendario.js"></script>
</body>
</head>

</html>