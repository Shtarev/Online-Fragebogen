function del(url, nr){
	if(nr == 'all'){
		var res = confirm("Sind Sie sicher, dass Sie alle Fragen löschen möchten?");
		if(res){
			document.location.href = url;
		}
		else {
			throw "stop";
		}
	}
	else {
		var res = confirm("Möchten Sie "+nr+" löschen?");
		if(res){
			document.location.href = url;
		}
		else {
			throw "stop";
		}
	}
}
send.onclick = function(){
	var parent = document.querySelector('#formID');
	var nodes = parent.children;
	for (var node of nodes) {
		var elem = node.id;
        var groupId = '';
		if(elem.indexOf('question') === 0){
            var leng = 'question'.length;  
            groupId = elem.substr(leng);
			var elemVal = document.getElementById(elem).value;
			if(!elemVal){
                alert('Sie haben das Feld mit der Frage nicht ausgefüllt');
                setTimeout(styleZuruck(elem), 2000);
                document.getElementById(elem).scrollIntoView();
                throw "stop";
			}
            var type = document.getElementById('type'+groupId).checked;
            var wiefiel = 0;
            var val = 0;
            for(var i=1; i<=6; i++){
                var a = 0;
                var b = 0;
                if(document.getElementById('ja'+groupId+i).checked){
                    wiefiel++;
                    a = 1;
                }
                if(document.getElementById('response'+groupId+i).value){
                    val++;
                    b = 1;
                }
                if(a == 1 && a != b){
                    alert('Sie haben das leere Feld als richtige Antwort markiert');
                    setTimeout(styleZuruck('response'+groupId+i), 2000);
                    document.getElementById(elem).scrollIntoView();
                    throw "stop";
                }
            }
            if(!type){
                if(wiefiel > 1){
                    alert('Sie haben mehrere Antworten auf die Frage ausgewählt, aber den Selektor nicht markiert. Поставьте галочку, если предполагаемых ответов больше чем один');
                    document.getElementById(elem).scrollIntoView();

                    setTimeout(styleZuruckCheck('type'+groupId), 2000);
                    throw "stop";
                }
            }
            if(!val){
                alert('Sie haben keine Antwort auf die Frage geschrieben');
                document.getElementById(elem).scrollIntoView();
                throw "stop";
            }
            if(!wiefiel){
                alert('Sie haben keine Antwort auf die Frage ausgewählt');
                document.getElementById(elem).scrollIntoView();
                throw "stop";
            }
        }
	}
    parent.submit();
}
function newPruf(){
    var elemChild = document.getElementById('newForm').children;
    var wiefiel = 0;
    var val = 0;
    for(var i=11; i<=16; i++){
        var a = 0;
        var b = 0;
        if(elemChild[i]['children'][0].checked){
            wiefiel++;
            a = 1;
        }
        var j = 1+i;
        if(elemChild[i]['children'][1].value){
            val++;
            b = 1;
        }
        if(a == 1 && a != b){
            alert('Sie haben das leere Feld als richtige Antwort markiert');
            var j = i-10;
            document.getElementById('newForm').scrollIntoView();
            setTimeout(styleZuruck('response'+0+j), 2000);
            throw "stop";
        }
    }
    if(!val){
        alert('Sie haben keine Antwort auf die Frage geschrieben');
        document.getElementById('newForm').scrollIntoView();
        throw "stop";
    }
    if(!wiefiel){
        alert('Sie haben keine Antwort auf die Frage ausgewählt');
        document.getElementById('newForm').scrollIntoView();
        throw "stop";
    }
    var type = document.getElementById('type0').checked;
    if(!type){
        if(wiefiel > 1){
            alert('Sie haben mehrere Antworten auf die Frage ausgewählt, aber den Selektor nicht markiert. Markieren Sie, wenn die erwarteten Antworten mehr als eine sind.');
            setTimeout(styleZuruckCheck('type0'), 2000);
            document.getElementById('newForm').scrollIntoView();
            throw "stop";
        }
    }
	var elem = document.getElementById('question0');
	if(elem.value == ''){
        alert('Sie haben das Fragefeld nicht ausgefüllt.');
        setTimeout(styleZuruck(elem.id), 2000);
        elem.scrollIntoView();
	}
	else{    
		newForm.submit();
	}  
}
function styleZuruck(elemId){
    document.getElementById(elemId).style.backgroundColor = '#fcbaba';
    setTimeout(()=>{
        document.getElementById(elemId).style.transition = '3s';
        document.getElementById(elemId).style.backgroundColor = 'white';
    }, 3000);
}
function styleZuruckCheck(elemId){
    document.getElementById(elemId).style.outline = '3px solid #fcbaba';
    setTimeout(()=>{
        document.getElementById(elemId).style.transition = '3s';
        document.getElementById(elemId).style.outline = '3px solid white';
    }, 3000);
}