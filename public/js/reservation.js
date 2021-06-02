var type_chambre = document.querySelector('.choiser_type_chambre');
var stokageEnfants = document.querySelector('.stokageEnfants')
var selectLocale = document.querySelector(".selectLocale");
var SdemiPension = document.querySelector(".SdemiPension");
var selectPension = document.querySelector(".selectPension");
var i;

// partie enfants

document.querySelector(".nbrEnfants").addEventListener("keyup", nombresEnfant);

function nombresEnfant() {
    document.querySelector(".stokageEnfants").innerHTML = "";

    var nbr = document.querySelector(".nbrEnfants").value;
    for (i = 0; i < nbr; i++) {
        document.querySelector(".stokageEnfants").innerHTML += `<div class="form-group"  > <input  class="form-control ageEnfant" id="${i}" name="enfants${i}" onkeyup="enfant(${i})" type="number" placeholder=" l'age du ${i+1} enfants " >  </div>
    </div> <span  class="form-group span${i}"  ></span>`;

        console.log("." + i);
    }

}

function enfant(i) {
    document.querySelector(".span" + i).innerHTML = "";

    var age = document.getElementById(parseInt(i)).value;
    console.log(age);

    if (age < 2 && age >= 1) {
        document.querySelector(".span" + i).innerHTML = `<div class="form-group"> <select name="service${i}" class="form-control selectchmabre"  required>
    <option value="" selected hidden>choiser le service</option>
    <option value="supp"  >  supplit enfanf </option>
    <option value="sans"> pas de supplement</option>
      </select>  </div>`;

    } else if (age >= 14) {

        document.querySelector(".span" + i).innerHTML = `<div class="form-group"> <select name="service${i}" class="form-control selectchmabre"  required>
        <option value="" selected hidden>choiser le service</option>
        <option value"chambre simple"  >  chambre simple </option>
        <option value="supp adulte"> lit supplimentaire</option>
          </select>  </div>`;

    }


}



// choisir le type de locale

selectLocale.addEventListener("change", choiseLocale);

function choiseLocale() {

    var a = selectLocale.selectedIndex;

    if (a == 1) {

        // si le client choiser une chambre

        type_chambre.innerHTML = `<div class="form-group"> <select class="form-control selectchmabre"  name="chambre_selected"   required>
                                        <option value="" selected hidden>Type de votre chambre</option>
                                        <option value="chambre_simple"  >Chambre simple</option>
                                        <option value="chambre_double"> chambre double</option>
                                          </select>  </div>`;
        document.querySelector(".selectchmabre").addEventListener("change", selectType_chambre);

        function selectType_chambre() {
            a = document.querySelector(".selectchmabre").selectedIndex;
            if (a == 1) {

                // si le client choiser une chambre simple
                document.querySelector(".Schambre").innerHTML = "";
                document.querySelector(".Stype_lit").innerHTML = "";

                document.querySelector(".Schambre").innerHTML = `<div class="form-group"> <select  class="form-control selectchmabre"   name="vue_selected_chambre_simple" required>
                <option value="" selected hidden>Type de vu</option>
                <option value="vueInt" >Vue intérieur</option>
                <option value="vueExt" >Vue extérieur</option>
                  </select>  </div>`;

            } else {
                // si le client choiser une chambre double
                document.querySelector(".Schambre").innerHTML = '';

                //   choiser ule type de lit 

                document.querySelector(".Schambre").innerHTML = `<div class="form-group"> <select  class="form-control selecttype_chmabre_double" name="chambre_double_selected"  required>
                <option value="" selected hidden>Type de repartition du lit</option>
                <option value="litDouble" >Lit double</option>
                <option value="litSimple">2 Lit simple</option>
                  </select>  </div>`;

                document.querySelector(".selecttype_chmabre_double").addEventListener("change", selecttype_chmabre_double);

                function selecttype_chmabre_double() {

                    a = document.querySelector(".selecttype_chmabre_double").selectedIndex;

                    if (a == 1) {
                        document.querySelector(".Stype_lit").innerHTML = '';

                        document.querySelector(".Stype_lit").innerHTML = `<div class="form-group"> <select  class="form-control type_lit_double"name="selected_vue_double"  required>
                    <option value="" selected hidden>Type de repartition du lit</option>
                    <option value="vueInt" >vue intérieur</option>
                    <option value="vueExt">2 vue extérieur</option>
                      </select>  </div>`;

                    } else {
                        document.querySelector(".Stype_lit").innerHTML = '';

                        document.querySelector(".Stype_lit").innerHTML = `<div class="form-group"> <select class="form-control type_lit_simple" name="selected_vue_double" required>
                            <option value="" selected hidden>Type de repartition du lit</option>
                            <option value="vueInt"  >vue intérieur</option>
           
                              </select>  </div>`;
                    }
                }
            }
        }

    } else {

        SdemiPension.innerHTML = "";
        document.querySelector(".Schambre").innerHTML = "";

        type_chambre.innerHTML = "";
    }
}


selectPension.addEventListener("change", choisePension);

function choisePension() {
    a = selectPension.selectedIndex;

    SdemiPension.innerHTML = "";
    if (a == 2) {

        SdemiPension.innerHTML = `<div class="form-group"> <select class="form-control type_demi_pension" name="pensionSelected"  required>
        <option value="" selected hidden>Type du pension demi</option>
        <option  value="dej" >dej/dej</option>
        <option value="diner">dej/diner</option>
          </select>  </div>`;
    }

}