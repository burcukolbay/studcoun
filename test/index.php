<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="jquery-2.1.0.min.js"></script>
    </head>
    <body>
        <button id="buton1">Tıkla</button>
        <div id="kutu1">
            
        </div>
        
        <script>
            //sayfa yüklenmesi tamamlandığında çalıştırılacak js kodları
            $(document).ready(function(){
                //buton1 tıklandığında gerçekleşecek js kodları
                $('#buton1').click(function(){
                    console.log('buton1e tıklandı');
                    
                    $.get(
                        'ajax.php',
                        function(data){
                            $('#kutu1').html(data);
                        }
                    )
                });
            });
        
        </script>
    </body>
</html>
