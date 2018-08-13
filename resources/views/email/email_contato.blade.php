<div style='background: #337ab7;width:700px;color:#333;min-height:180px;padding:10px;font-family: Helvetica Neue,Helvetica,Arial,sans-serif;line-height:1.4285714'>

    <div style='padding:10px;background:#FFF;font-size: 18px;border-radius: 5px;border: 1px solid #036;min-height: 90px;padding: 15px;'>

        <div style='width: 100%;'>Contato Sistema de Catracas</div>
        <div style='border-top:1px solid #CCC;border-bottom:1px solid #CCC;width:300px;margin:20px 0 20px 0;padding: 15px 0 15px 0;'>Dados da Menssagem</div>

        <div>
            <table>
                <tr>
                    <th>Nome:&nbsp;&nbsp;</th>
                    <td>
                        {{ $dados->name }}
                    </td>
                </tr>
                <tr>
                    <th>Tipo de Problema:</th>
                    <td>
                        {{ $dados->problema }}</td>
                </tr>
                <tr>
                    <th>Menssagem:&nbsp;&nbsp;&nbsp;</th>
                    <td>
                        {{ $dados->menssagem }}
                    </td>
                </tr>
            </table>
        </div>

        <br>
        <br>

        <small style='font-size: 14px;'>Contato Efetuado Em:
            <?php echo date('d/m/Y H:i') ?>
        </small>
    </div>
</div>