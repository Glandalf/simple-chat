document.getElementById("inscriptionForm").addEventListener("submit", function(e) {
    e.preventDefault();  
    //initialisation variable //  
    let erreur;
    let pseudo = document.getElementById("pseudo");
	let email = document.getElementById("email");
    let birthdate = document.getElementById("birthdate");
    let mdp = document.getElementById("mdp");
    let mdp2 = document.getElementById("mdp2");

    //gestion champs non renseignés//
    let inputs = this.getElementsByTagName("input");
 
	for (let i = 0; i < inputs.length; i++) {
		console.log(inputs[i]);
		if (!inputs[i].value) {
			erreur = "Veuillez renseigner tous les champs";
        }
        
    }
    function ValidateMdp(mdp) {
    if (mdp!= mdp2) {
        alert ("\erreur: les mots de passes ne correspondent pas")
        return false;
        }
        else return true;
    }

    function ValidateEmail(mail) {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(myForm.emailAddr.value))
        {
            return (true)
        }
            alert("You have entered an invalid email address!")
            return (false)
    }
        
	//gestion erreur //
	if (erreur){
        e.preventDefault();
        document.getElementById("erreur").innerHTML=erreur;
        return false;
    } else {
        alert("Formulaire envoyé")
    }
 
});

	
