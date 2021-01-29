<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link
            href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap"
            rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <style>
                * {
                    margin: 0;
                    padding: 0;
                    font-family: 'Ubuntu', sans-serif;
                }
        
                body {
                    background-color: #202124;
                    color: white;
                }
        
                .big-container {
                    padding: 10px;
                    margin: 25px;
                    align-content: center;
                    border: 1px solid grey;
                    border-radius: 6px;
                    background-color: #373737;
                    text-align: center;
                }
        
                html[data-theme='dark'] {
                    background: #000;
                    filter: invert(1) hue-rotate(180deg)
                }

                textarea{
                    font-size: small;
                    text-align:left !important;
                    border: 2px solid grey;
                }
            </style>
    </head>
    <body>
        <div class='big-container'>

            <section>
                <div class="">
                    <div class="row">
                        <div class="col-6">
                            <textarea id="code" rows="30" cols="50">
                                atributo.
                                isan.
                                metodo.
                                asignacion.
                                precio.
                                299500.
                                decision.
                                precio<283241.21.
                                    asignacion.
                                    isan.
                                    precio*0.02.
                                    fin.
                                    decision.
                                    precio<339889.39.
                                    asignacion.
                                    isan.
                                    ((precio-283241.21)*0.05)+5664.73.
                                    fin.
                                    decision.
                                    precio<396537.79.
                                    asignacion.
                                    isan.
                                    ((precio-339889.39)*0.1)+8497.27.
                                    fin.
                                    decision.
                                    precio<509833.95.
                                    asignacion.
                                    isan.
                                    ((precio-396537.79)*0.15)+14162.08.
                                    fin.
                                    asignacion.
                                    isan.
                                    ((precio-509833.95)*0.17)+31156.48.
                                    fin.
                                    atributo.
                                    precio.
                                    numero.
                                    299500.
                                    atributo.
                                    marca.
                                    cadena.
                                    seat.
                                    atributo.
                                    modelo.
                                    numero.
                                    2020.
                                    fin.
                            </textarea>
                        </div>
                        <div class="col-6">
                            <textarea id="salida" rows="30" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Resultado:</p>
                            <p id="demo"></p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-default" id="run">Run</button>
                <button class="btn btn-default" id="ejecutar">Ejecutar</button>
            </section>
        </div>
        <script>
            $(document).ready(function(){
        
                var result = '';
        
                $("#run").click(function(){
        
                    var to_compile = {
                        "LanguageChoice": "19",
                        "Program": `objeto:- write('{ '), read(X), a1(X), write('}'). a1(X):- X = 'atributo' -> atributo; 
                                    write(' '). atributo:- read(X), write('"'), write(X), write('":'), tipoatributo(X), otro. 
                                    otro:- read(X), X = 'atributo' -> write(', '), atributo; write(' '). tipoatributo(M):- 
                                    read(X), (X = 'metodo' -> metodo(M);  X = 'numero' -> numero; X = 'cadena' -> cadena; 
                                    X = 'objeto' -> objeto;  X = 'arreglo' -> arreglo; write(' ') ). cadena:- read(X), write('"'), 
                                    write(X), write('"'). numero:- read(X), write(X). arreglo:- write('['), read(X), elemento(X). 
                                    elemento(X):- tipoatributo(X) , otroElemento. otroElemento:- read(X), X = 'elemento' -> write(',') , 
                                    elemento(X) ; X = 'finArr' -> write(']') ; otro. metodo(M):- write('"function() {'),a2,write(' return '), 
                                    write(M), write(';}"'). a2:- read(X), (X='decision'->decision;a3(X)). a3(X):- X='asignacion' -> 
                                    asignacion;(a4(X)). a4(X):- X='fin' -> write('');(write('ERROR: '),write(X)). asignacion:- read(X), 
                                    write(X), write('='), read(Y), write(Y), write(';'),a2. decision:- write('if('),condicion,write(')'), 
                                    verdadero,falso. condicion:-read(X), write(X). verdadero:- write('{'),a2,write('}'). falso:- write('else {'),a2,write('}'). 
                                    :- objeto.`,
                        "Input": $("#code").val(),
                        "CompilerArgs" : ""
                    };
                    
                    
                    $.ajax ({
                            url: "https://rextester.com/rundotnet/api",
                            type: "POST",
                            data: to_compile
                        }).done(function(data) {
                            result = data.Result;
                            $("#salida").val(data.Result);
                        }).fail(function(data, err) {
                            alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
                    });
                        
                });
        
                $("#ejecutar").click(function(){
                
                    var text = result;
                    var obj = JSON.parse(text);
                    obj.isan = eval("(" + obj.isan + ")");
                    document.getElementById("demo").innerHTML = obj.isan();
                
                });
        
            });
            </script>
    </body>
</html>