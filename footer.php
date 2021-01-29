	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script>
		const htmlEl = document.getElementsByTagName('html')[0];

		const toggleTheme = (theme) => {
			htmlEl.dataset.theme = theme;
		}

		$(document).ready(function() {
			let result = '';

			$("#run").click(function() {
				console.log('$("#code" .val():>> ', $("#code").val());
				let to_compile = {
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
					"CompilerArgs": ""
				};

				$.ajax({
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

			$("#ejecutar").click(function() {
				let text = result;
				let obj = JSON.parse(text);
				obj.isan = eval("(" + obj.isan + ")");
				document.getElementById("demo").innerHTML = obj.isan();
			});

			$("#superqueries").click(function() {
				let to_compile = {
					"LanguageChoice": "19",
					"Program": `superquery:- read(T), read(C), read(C2), superquery1(T,C), superquery2(T,C,C2).
								superquery1(T,C):- write('SELECT '), write(C), write(', '), sentenciacount(T),
												write(') AS probabilidad FROM '), write(T), write(' WHERE '), sentenciain(T,C), 
												write(' GROUP BY '),write(C), write(';\n').                              
								superquery2(T,C,C2):- write('SELECT '), write(C), write(', '), write(C2), write(', '),sentenciacount(T), 
													write(') AS probabilidad FROM '), write(T), write(' WHERE '), 
													sentenciain(T,C), write(' AND '), sentenciain(T,C2),
													write(' GROUP BY '), write(C2), write(','), write(C), write(' ORDER BY '), write(C), write(', '), write(C2), write(';').
								sentenciacount(T):- write('COUNT(*)/(SELECT COUNT(*) FROM '), write(T).                   
								sentenciain(T,C):- write(C), write( ' IN(SELECT DISTINCT '),write(C), write(' from '), write(T),write(')').    
								:- superquery.`,
					"Input": $('#table').val() + ". " + $('#campo1').val() + ". " + $('#campo2').val() + ".",
					"CompilerArgs": ""
				};

				$.ajax({
					url: "https://rextester.com/rundotnet/api",
					type: "POST",
					data: to_compile
				}).done(function(data) {
					let queries = data.Result.split(';');
					$("#query1").val(queries[0]);
					$("#query2").val(queries[1]);
					$("#consultar").prop("disabled", false);
				}).fail(function(data, err) {
					alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
				});
			});

		});

		$('#select_industry').on('submit', function(event) {
			event.preventDefault();
			$.ajax({
				url: "consultas.php",
				method: "POST",
				data: $(this).serialize(),
				dataType: "json",
				beforeSend: function() {
					$('#send').attr('disabled', 'disabled');
				},
				success: function(data) {
					$('#send').attr('disabled', false);
					if (data) {
						$('#table_data').prepend(data);
					}
				}
			})
		});

		$('#table').change(function() {
			$.ajax({
				url: "consultas.php",
				method: "POST",
				dataType: "JSON",
				data: {
					action: "campos",
					tabla: $('#table').val()
				}
			}).done(function(data) {
				$("#campo1").html(data);
				$("#campo2").html(data);
				$("#superqueries").prop("disabled", false);
			}).fail(function(data, err) {
				alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
			});
		});

		$('#consultar').click(function() {
			$.ajax({
				url: "consultas.php",
				method: "POST",
				dataType: "JSON",
				data: {
					action: "consulta",
					query1: $('#query1').val().trim(),
					query2: $('#query2').val().trim(),
					campo1: $('#campo1').val().trim(),
					campo2: $('#campo2').val().trim(),
				}
			}).done(function(data) {
				console.log(data);
				
				$("#col1").append($('#campo1').val());
				$("#col2").append($('#campo1').val());
				$("#col3").append($('#campo2').val());
				$("#table_proba1").html(data['table1']);
				$("#table_proba2").html(data['table2']);
				$("#probabilidades").css("display", '');
			}).fail(function(data, err) {
				alert("fail " + JSON.stringify(data) + " " + JSON.stringify(err));
			});
		});
	</script>
	</body>

	</html>