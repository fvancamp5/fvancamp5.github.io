$(document).ready(function(){
    $('#myForm').submit(function(event){
        

        let Valid = true;

        if(!$("#myForm input[type=\"text\"][id = \"fname\"]").val()){
            $('#myForm input[type="text"][id = "fname"]').addClass("error");
            Valid = false;
        }
        else {
            $('#myForm input[type="text"][id = "fname"]').removeClass("error");
            Valid = true;
        }

        if(!$("#myForm input[type=\"text\"][id = \"lname\"]").val()){
            $('#myForm input[type="text"][id = "lname"]').addClass("error");
            Valid = false;
        }
        else {
            $('#myForm input[type="text"][id = "lname"]').removeClass("error");
            Valid = true;
        }
    
        if(!$("#myForm input[type=\"email\"]").val()){
            $('#myForm input[type="email"]').addClass("error");
            Valid = false;
        }
        else {
            $('#myForm input[type="email"]').removeClass("error");
            Valid = true;
        }

        if(!$("#myForm textarea").val()){
            $('#myForm textarea').addClass("error");
            Valid = false;
        }
        else {
            $('#myForm textarea').removeClass("error");
            Valid = true;
        }

        if(!$('#myForm input[type="radio"][id = "oui"]:checked').val() && !$('#myForm input[type="radio"][id = "non"]:checked').val()){
            $("#majority").html('<b>' + 'Veuillez renseigner ce champ' + '</b>');
            Valid = false;
        }
        else {
            $("#majority").html('<b>' + '' + '</b>');
            Valid = true;
        }

        $('#file').on('change', function() {
            const size  = (this.files[0].size / 1024 / 1024).toFixed(2);
            if (size > 2) {
                alert ("Le fichier est trop volumineux");
                $("#weight").html('<b>' + 'Taille du fichier : ' +  size + ' Mo' + '</b>');
                Valid = false;
            }
            else{
                $("#weight").html('<b>' + 'Taille du fichier : ' +  size + ' Mo' + '</b>');
                Valid = true;
            }
        });

        if(Valid === false){
            event.preventDefault();
            alert("Un champ n'est pas valide ! Veuillez renseigner les informations demandées");
        }
        

    });


});
