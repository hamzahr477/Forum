function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.match(mailformat))
{
return true;
}
else
{
return false;
}
};
function Validatename(inputText) {


var nameformat = /^[a-zA-Z-\s]+$/;


  if (inputText.match(nameformat)) {
    
    return true;
}
else
{
return false;
}

};
function ValidatePhone(inputText)
{
var phoneformat = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;

if(inputText.match(phoneformat))
{

return true;
}
else
{

return false;
}
};
function ValidateLength(inputText,max,min) {
	var message;
    if (inputText.length>max) {
        return false;
    }else if (inputText.length<min) {
        return false;
    }else return true;
};

function isValidDate(dateString)
{
	 var regEx = /^\d{4}-\d{2}-\d{2}$/;
  if(!dateString.match(regEx)) return false;  // Invalid format
  var d = new Date(dateString);
  var dNum = d.getTime();
  if(!dNum && dNum !== 0) return false; // NaN value, Invalid date
  return d.toISOString().slice(0,10) === dateString;
};
function validatorform1(){
	var phone=document.getElementById("phone").value;
	var email=document.getElementById("email").value;
	var pays=document.getElementById("pays").value;
	var ville=document.getElementById("ville").value;
	var date=document.getElementById("date").value;
	var etablissement=document.getElementById("etablissement").value;
	if(ValidatePhone(phone)){
		if(ValidateEmail(email)){
			if(pays.length==0 || ValidateLength(pays,30,2)){
				if(ville.length==0 || ValidateLength(ville,30,2)){
					if(date.length==0 || isValidDate(date)){
						if(ValidateLength(etablissement,40,0)){
								return true;
							}
						else   alert("le chemp d'etablissement doit etre sup à  et inf à 40");

					}else   alert("la date est incorrect!");
				}
				else   alert("le chemp de ville doit etre sup à 2 et inf à 30");

			}else   alert("le chemp de pays doit etre sup à 2 et inf à 30");
		}else   alert("l'email est incorrect!");
	}else   alert("la numero de telephone est incorrect!");

return false;
};
function validatorform2(){
	var ville=document.getElementById("ville").value;
	var date=document.getElementById("date").value;
	var etablissement=document.getElementById("etablissement").value;
if(ValidateLength(ville,30,1)){
	if(isValidDate(date)){
		if(ValidateLength(etablissement,40,1)){
			return true;
		}
		else   alert("le chemp d'etablissement doit etre sup à 1 inf à 40");

	}else   alert("la date est incorrect!");
}
else   alert("le chemp de ville doit etre sup à 1 et inf à 30");

return false;

};

function validatorform3(){
	var nom=document.getElementById("nom").value;
	var prenom=document.getElementById("prenom").value;
	var email=document.getElementById("email").value;
	var phone=document.getElementById("Telephone").value;
	var pays=document.getElementById("pays").value;
	var password=document.getElementById("password").value;
	var cpassword=document.getElementById("cpassword").value;
if(nom.length != 0){
	if(prenom.length != 0){
		if(ValidateEmail(email)){
		  if(ValidatePhone(phone)){
			if(ValidateLength(pays,30,2)){
						if(ValidateLength(password,16,8)){
							if(password==cpassword){
								return true;
							}alert("Les deux mots de passe ne sont identique");
							}
						else   alert("Le mot de passe doit étre entre 8 et 16 caractères");
			}else alert("le chemp de pays doit etre sup à 1 et inf à 30");
		}else   alert("la numero de telephone est incorrect!");
	}else   alert("l'email est incorrect!");
}else   alert("Le nom doit étre superieur à 1 caractères");
}else   alert("Le prenom doit étre superieur à 1 caractères");
return false;
}
;
function validatorform4(){	

	var email=document.getElementById("email").value;
	var password=document.getElementById("password").value;
		if(email.length!=0){
			if (password.length!=0) {
				if(ValidateLength(password,16,8)){
								return true;
							}
						else   alert("Le mot de passe est incorrect!!");
			}else alert("Saisie votre mot de passe");
						
	}else   alert('Saisie votre e-mail ou Login');
return false;
}
;

function validatorform5(){
	var username=document.getElementById("username").value;
	var email=document.getElementById("email").value;
	var objet=document.getElementById("objet").value;
    var details=document.getElementById("details").value;
if(ValidateLength(username,30,2)){
	if(Validatename(username)){
		if(ValidateEmail(email)){
		if(objet.length>3){
					if(details.length>30){
			return true;
		}
		else   alert("SVP, le champs détails doit étre superieur à 30 carractére pour détailer bien votre probleme");

	}else   alert("L'objet est invalid svp ecris un objet superieur à 3 carractére");
}else alert("Votre e-mail est incorrect");

}else alert("Votre nom est incorrect");

}else   alert("Votre nom est invalide");
return false;

};

function myValidation(){

	var sub=document.getElementById("sub").value;
	if(sub == 'inscri'){
		return validatorform3();
	}
	if(sub=='login'){
		return validatorform4();
	}
	if(sub=='Enregistrer'){
		return validatorform1();
	}
	if(sub=='premiere_inscription'){
			return validatorform2();
        }
    if(sub='contact') return validatorform5();

};
