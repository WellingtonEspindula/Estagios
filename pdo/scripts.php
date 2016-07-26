<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<!--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js"></script>
-->
<script type="text/javascript" src="../../jquery.mask.min.js"></script>
<script type="text/javascript" src="../../jquery.validate.js"></script>
<script type="text/javascript" src="../../jquery.maskedinput.min.js"></script>
<script type="text/javascript">
    $.validator.addMethod( "date", function( value, element ) {
	var check = false,
		re = /^\d{1,2}\/\d{1,2}\/\d{4}$/,
		adata, gg, mm, aaaa, xdata;
	if ( re.test( value ) ) {
		adata = value.split( "/" );
		gg = parseInt( adata[ 0 ], 10 );
		mm = parseInt( adata[ 1 ], 10 );
		aaaa = parseInt( adata[ 2 ], 10 );
		xdata = new Date( Date.UTC( aaaa, mm - 1, gg, 12, 0, 0, 0 ) );
		if ( ( xdata.getUTCFullYear() === aaaa ) && ( xdata.getUTCMonth() === mm - 1 ) && ( xdata.getUTCDate() === gg ) ) {
			check = true;
		} else {
			check = false;
		}
	} else {
		check = false;
	}
	return this.optional( element ) || check;
    }, $.validator.messages.date );
    </script>
   
    <script type="text/javascript">
	    $.validator.addMethod( "cep", function( cep_value, element ) {
		return this.optional( element ) || /^\d{2}.\d{3}-\d{3}?$|^\d{5}-?\d{3}?$/.test( cep_value );
		}, "Informe um CEP válido." );
    </script>
	
	<script type="text/javascript" >
		$.validator.addMethod( "cpf", function( value ) {
	
		// Removing special characters from value
		value = value.replace( /([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g, "" );
	
		// Checking value to have 11 digits only
		if ( value.length !== 11 ) {
			return false;
		}
	
		var sum = 0,
			firstCN, secondCN, checkResult, i;
	
		firstCN = parseInt( value.substring( 9, 10 ), 10 );
		secondCN = parseInt( value.substring( 10, 11 ), 10 );
	
		checkResult = function( sum, cn ) {
			var result = ( sum * 10 ) % 11;
			if ( ( result === 10 ) || ( result === 11 ) ) {
				result = 0;
			}
			return ( result === cn );
		};
	
		// Checking for dump data
		if ( value === "" ||
			value === "00000000000" ||
			value === "11111111111" ||
			value === "22222222222" ||
			value === "33333333333" ||
			value === "44444444444" ||
			value === "55555555555" ||
			value === "66666666666" ||
			value === "77777777777" ||
			value === "88888888888" ||
			value === "99999999999"
		) {
			return false;
		}
	
		// Step 1 - using first Check Number:
		for ( i = 1; i <= 9; i++ ) {
			sum = sum + parseInt( value.substring( i - 1, i ), 10 ) * ( 11 - i );
		}
	
		// If first Check Number (CN) is valid, move to Step 2 - using second Check Number:
		if ( checkResult( sum, firstCN ) ) {
			sum = 0;
			for ( i = 1; i <= 10; i++ ) {
				sum = sum + parseInt( value.substring( i - 1, i ), 10 ) * ( 12 - i );
			}
			return checkResult( sum, secondCN );
		}
		return false;
	
	}, "Please specify a valid CPF number" );
	</script>
	<script type="text/javascript">
	    $.validator.addMethod( "nowhitespace", function( value, element ) {
		return this.optional( element ) || /^\S+$/i.test( value );
	}, "Sem espaços vazios, por favor." );
	$.validator.addMethod( "integer", function( value, element ) {
		return this.optional( element ) || /^-?\d+$/.test( value );
	}, "Um número positivo ou negativo não-decimal, por favor." );
	</script>
	<script type="text/javascript">
		$.validator.addMethod( "cep", function( cep_value, element ) {
			return this.optional( element ) || /^\d{2}.\d{3}-\d{3}?$|^\d{5}-?\d{3}?$/.test( cep_value );
		}, "Informe um CEP válido." );		
	</script>
	<script type="text/javascript">
		$.validator.addMethod("telefone", function(value, element) {
			return this.optional(element) || /^\(\d{2}\) \d{4}\-\d{4}?$/.test(value);
		}, "Digite um telefone válido");
	</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".date").mask('00/00/0000');
        $(".telefone").mask('(00) 0000-0000');
        $(".cep").mask('00000-000');
        $(".rg").mask('0000000000');
        $(".uf").mask('aa');
        $(".cnpj").mask('00000000000000');
        $(".cpf").mask('00000000000');
        $("#formulario").validate({
            rules: {
                inicio: "date",
                fim: "date",
                cpf: {
                    required: true,
                    minlength: 11,
                    maxlength: 11
                },
                date: {
                    required: true,
                    date: true
                },
                cnpj: {
                    required: true,
                    number: true,
                    minlength:14,
                    maxlenght:14
                },
                cep:  {
                    required: true,
                    cep: true
                },
                telefone: {
                    required: true,
                    phone: true
                },
                rg:  {
                    required: true,
                    number: true,
                    minlength:10,
                    maxlenght:10
                },
                uf:  {
                    required: true,
                    minlength:2,
                    maxlenght:2
                },    
                email:  {
                    required: true,
                    email: true
                }
            }
        });
    })
</script>