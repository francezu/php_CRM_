/**
 * Created by Tatar on 22-Mar-17.
 */



$(document).ready(function(){

    /*pour chaque tableau on appele la function countParticipants()*/
        for(var i=0;i<php_var;i++){
            countParticipants(i);
        }
        /*reçoit id de la table et calcule les participant en excluant ce qui on annulé*/
        function countParticipants(id){
            var table = document.getElementById('table_'+id);
            var numParticipants=0;
            for(var i=0;i<table.tBodies[0].rows.length;i++){
                if(table.tBodies[0].rows[i].cells[9].innerHTML!='annule'){
                    numParticipants=numParticipants+1;
                }
            }
           console.log(numParticipants);
            document.querySelector('#n_participants_'+id).innerHTML=numParticipants;
        }


    $('.PrintPDF').on('click',function(){
        /* we take the id of the cours */
        var id=$(this).attr('id');

        /* on copie la table dans une variable*/
        var table = document.getElementById('table_'+id);

        /*affiche colones cache*/
        for(var i=5;i<10;i++){
            $(table).find('th:nth-child('+i+')').show();
            $(table).find('td:nth-child('+i+')').show();
        }

        /* on copie la table dans une variable*/
        var table = document.getElementById('table_'+id);


        /*hide les participants annule*/
         for(var i=0;i<table.tBodies[0].rows.length;i++){
           if(table.tBodies[0].rows[i].cells[9].innerHTML=='annule'){
               table.tBodies[0].rows[i].style.display = 'none';
           }

         }
        var doc = new jsPDF('l', 'pt');

        var ateliers=$('#intitule_'+id).text();
        var heures=document.getElementById('heures_'+id).innerHTML;
        var prof =document.getElementById('prof_'+id).innerHTML;

        /*var dates=document.getElementById('dates_'+id).innerHTML;*/
        /*.text() supprimé les balise HTMLs*/
        var dates=$('#dates_'+id).text();


        doc.text(ateliers, 40, 40);
        doc.text(heures, 660, 70);
        doc.setFontSize(14);
        doc.text(prof, 40, 90);
        doc.setFontSize(10);/*on change la taille du text */
        doc.text(dates, 40, 110);

        var res = doc.autoTableHtmlToJson(table);
        doc.autoTable(res.columns, res.data,{startY: 120});
        doc.output("dataurlnewwindow");

        /*show les participants annule*/
        for(var i=0;i<table.tBodies[0].rows.length;i++){
            if(table.tBodies[0].rows[i].cells[9].innerHTML=='annule'){
                table.tBodies[0].rows[i].style.display = '';
            }

        }

        /*on cache les colones*/
        for(var i=5;i<10;i++){
            $(table).find('th:nth-child('+i+')').hide();
            $(table).find('td:nth-child('+i+')').hide();
        }
    });



    /**
     * TODO
     */
    $('.presence').on('click',function(){
        var id = $(this).attr('id');
        var table = document.getElementsByTagName('table')[id];
        var atelier =$('#atelier'+id+' > strong').text();

        var atelierEtNom=$('#atelier'+id.replace('Print','')).text();
        var heures=document.getElementById('heures'+id.replace('Print','')).innerHTML;
        var prof =document.getElementById('prof'+id.replace('Print','')).innerHTML;
        //var jours=document.getElementById('jours'+id.replace('Print','')).innerHTML;
        var jourDeLaSemaine=$('#jours'+id.replace('Print','')).text();


        var rowstable =table.rows;
        var arrNom=[];
        var arrPrenom=[];


        /*on place les nom et les prenom dans une array*/
        for(var i=1;i<$('#PDFtoPrint'+id+' tr').length;i++){
            arrNom.push(rowstable[i].childNodes[2].textContent);
            arrPrenom.push(rowstable[i].childNodes[3].textContent);
        }



        /* on cree le tableau  avec les nom prenom et on appele la function dateCour pour place les date corespondant*/
        /* ou jour de la semaine*/
        function createTable(nom,prenom,jourDeLaSemaine,atelier) {
            var table = document.createElement("TABLE");
            var tableHead = document.createElement("THEAD");
            var tableBody = document.createElement("TBODY");
            var tr = document.createElement('TR')

            var nomPrenom=["Nom","Prenom"] ;


            var headTableau = nomPrenom.concat(['Lundi','Mardi','Mercredi','Jeudi','Vendredi']);

            for (var i = 0; i < headTableau.length; i++) {
                var th = document.createElement('TH');
                var t = document.createTextNode(headTableau[i]);
                th.appendChild(t);
                tr.appendChild(th);
            }
            tableHead.appendChild(tr);
            table.appendChild(tableHead);


            for(var j=0;j<prenom.length;j++){
                var row=document.createElement("TR");

                for(var i=0;i<2;i++){

                    var cell = document.createElement("TD");
                    if(i==0){ var cellText = document.createTextNode(nom[j]);}
                    else if(i==1){var cellText = document.createTextNode(prenom[j]);}
                    cell.appendChild(cellText);
                    row.appendChild(cell);

                }
                tableBody.appendChild(row);
            }
            table.appendChild(tableBody);

            return table;
        }



        var doc = new jsPDF('l', 'pt');

        doc.text(atelierEtNom, 40, 40);
        doc.text(heures, 660, 70);
        doc.setFontSize(14);
        doc.text(prof, 40, 90);
        doc.setFontSize(10);/*on change la taille du text */
        doc.text(jourDeLaSemaine, 40, 110);


        var j ={Dimanche:0,Lundi:1,Mardi:2,Mercredi:3,Jeudi:4,Vendredi:5,Samedi:6};

        var res = doc.autoTableHtmlToJson(createTable(arrNom,arrPrenom,j[jourDeLaSemaine],atelier));
        doc.autoTable(res.columns, res.data,{theme: 'grid',startY: 120});
        doc.output("dataurlnewwindow");

    });


});
