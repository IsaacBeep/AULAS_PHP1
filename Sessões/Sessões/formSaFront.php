<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saude</title>
    <!-- Escreva o CSS ou UTILIZE BOOTSTRAP NO CODIGO ABAIXO-->
    <link rel="stylesheet" href="estilo.css">
    <script src="formulario.js"></script>
</head>
<body>
    <form method="GET" action="formBack.php" id="Formulario">
        <!-- DADOS PESSOAIS-->
         <fieldset>
            <div>
                <h3>INSERIR DADOS DO CLIENTE</h3>
            </div>

            <div id="linha">
                <hr>
            </div>
            <br>
            <div id="autor">
                <h2>ALUNO ISAAC SILVA DE LIMA SOUZA</h2>
        
            </div>

            <table border="0" cellspacing="5">
                <tr> <!-- NOME -->
                    <td align="right">
                        <label for="nome">Nome:</label>
                    </td>

                    <td>
                        <input name="Nome" class="tamanho" type="text" required onkeypress="mascara(this, nome)" size="20">
                    </td>
                </tr>

                <tr>
                    <tr> <!-- TELEFONE -->
                        <td align="right">
                            <label for="telefone">Telefone:</label>
                        </td>
    
                        <td>
                            <input name="Telefone" type="text" required onkeypress="mascara(this, telefone)" maxlength="15">
                        </td>
                    </tr>
                    
                </tr>

                <tr>
                    <tr> <!-- EMAIL -->
                        <td align="right">
                            <label for="email">Email:</label>
                        </td>
    
                        <td>
                            <input name = "Email" type="email" required onkeypress="mascara(this, email)" >
                        </td>
                    </tr>
                    
                </tr>

                <tr> <!-- DATA DE NASCIMENTO -->
                    <td align="right">
                        <label for="dt">Ano de Nascimento:</label>
                    </td>

                    <td>
                        <label for="">
                            <input  name="Dt" type="text" required onkeypress="mascara(this, data)" maxlength="10"> (DD:MM:AAAA)
                        </label>
                    </td>
                    <td>
                    </td>
                </tr>

                <tr>
                    <tr> <!-- ENDEREÇO -->
                        <td align="right">
                            <label for="Endereco">Endereço:</label>
                        </td>
    
                        <td>
                            <input class="tamanho" type="text" name="Endereco" id="" required>
                        </td>
                    </tr>
                </tr>

                <tr> <!-- BAIRRO -->
                    <td align="right">
                        <label for="bairro">Bairro:</label>
                    </td>

                    <td>
                        <input class="tamanho" type="text" name="Bairro" id="" required>
                    </td>
                </tr>

                <tr> <!-- CIDADE -->
                    <td align="right">
                        <label for="cidade">Cidade:</label>
                    </td>

                    <td>
                        <input class="tamanho2" type="text" name="Cidade" id="" required>
                    </td>
                </tr>

                <tr> <!-- CEP -->
                    <td align="right">
                        <label for="cep">CEP:</label>
                    </td>

                    <td>
                        <input name="Cep" type="text" onkeypress="mascara(this, cep)" maxlength="10">

                    <!-- UF -->
                    <td align="right">UF:
                        <select id="estado" name="Estado" class="estados">
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="SP">Sao Paulo</option>
                            <option value="PR">Parana</option>
                            <option value="PB">Paraiba</option>
                        </select>
                    </td>
                    </td>
                </tr>
                
                <tr> <!-- PAIS -->
                    <td align="right">
                        <label for="pais">País:</label>
                    </td>

                    <td>
                        <input class="tamanhoo2" type="text" name="Pais" id="" value="brasil" required>
                    </td>
                </tr>

            </br>
            </br>
                <tr> <!-- BOTÃO -->
                    <td class="botao">
                        <input class="btn1" type="submit" onclick="return validar" value="Enviar">
                        <input class="btn2" type="button" value="Cancelar">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

</body>
</html>