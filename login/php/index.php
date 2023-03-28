<?php
$mensagem  = "Preencha os dados do feedback";

$nome = "";
$sobrenome = "";
$experiencia='';
$email = "";
$ava = "";
$ava1 = null;

if (isset($_POST["nome"], $_POST["email"], $_POST["sobrenome"], $_POST["experiencia"], $_POST["ava"])){   
    $nome = filter_input (INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $sobrenome = filter_input (INPUT_POST, "sobrenome", FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $experiencia = filter_input (INPUT_POST, "experiencia", FILTER_SANITIZE_STRING);
    $ava = filter_input (INPUT_POST, "str", FILTER_SANITIZE_STRING);

    if (!$nome || !$sobrenome || !$email || !$experiencia || !$ava) {
        $mensagem  = "Dados invalidos tente novamente";
    }else{
        $mensagem  = "Feedback Enviado com sucesso";

        //Declaramos a variável que vai receber o conteúdo da lista
        $ava1 = null;

        
        //Verificamos se o índice existe
        if (isset($_POST['ava']))
        
            //Atribuimos a variável todo conteúdo do índice
            $ava1 = $_POST['ava'];
        
        //Verificamos se a variável não é nula
        if ($ava1 !== null)
        
            //Percorremos todos os conteúdos do array
            for ($i = 0; $i < count($ava1); $i++)
            
                //exibimos o valor atual na tela
                //echo "<p>{$ava1[$i]}</p>";
                $str = implode(':', $ava1);
      

        
        /**
         * Recebe um parâmetro e exibe o seu conteúdo
         *
         * @param  mixed $param
         * @return void
         */
        function dd($param)
        {
            echo '<pre>';
            print_r($param);
            echo '</pre>';
            die();
        }


        function limpar(){
            ("input").val("");
            ("textarea").val("");
        }

        $conexao = new PDO ("mysql:host=localhost;dbname=login", 'root', 'root');

        $stm = $conexao -> prepare ('INSERT INTO formulario(nome,sobrenome,email,xp,ava_cli) VALUES (:nome,:sobrenome,:email, :xp, :ava_cli)');
    
        $stm ->BindParam("nome", $nome);
        $stm ->BindParam("sobrenome", $sobrenome);
        $stm ->BindParam("email", $email);
        $stm ->BindParam("xp", $experiencia);
        $stm ->BindParam("ava_cli", $str);
    
        $stm ->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>    
</head>
<body>
    <main>
        <form method="POST">
        <div class="mensagem">
            <?=$mensagem ?>
        </div>
            <label id='txt'> Nome </label>
            <input id='inp' type='text' name='nome' placeholder='Insira seu nome' require/>
            <label id='txt'> Sobrenome </label>
            <input id='inp' type='text' name='sobrenome' placeholder='Insira seu sobrenome' require/>

            <label id='txt'> Email </label>
            <input id='inp' type='text' name='email' placeholder='Insira seu email' require/>


            <li>
                <label id='txt'> Como voce avaliaria nossos serviços? </labeL>

                <input name = 'ava[]' value="Excelente" id='cb' type='checkbox' require/> <label id='txt'> Excelente <label>

                <input name = 'ava[]' value="Muito bom" id = 'cb' type='checkbox'  require/> <label id='txt'> Muito bom <label>

                <input name = 'ava[]' value="Bom"id='cb' type='checkbox'  require/> <label id='txt'> Bom <label>  

                <input name = 'ava[]' value="Justo" id='cb' type='checkbox'  require/> <label id='txt'> Justo <label>

                <input name = 'ava[]' value="Ruim" id='cb' type='checkbox'  require/> <label id='txt'> Ruim <label> <br>

                <input type="hidden" name = "btnSubmiti" value="Enviar" require/>
            </li>

            <label id='txt'> Descreva sua Experiencia </label>

            <textarea name='experiencia'></textarea>

            <button type='submit'> Enviar </button>






        </form>




    </main>
    
</body>
</html>