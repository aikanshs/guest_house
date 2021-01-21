// $("#end_date").checkDate(function () {
//     var startDate = document.getElementById("start_date").value;
//     var endDate = document.getElementById("end_date").value;
 
//     if ((Date.parse(endDate) <= Date.parse(startDate))) {
//         alert("End date should be greater than Start date");
//         document.getElementById("end_date").value = "";
//     }
// });

function checkDate(){
	var startDate = new Date($('start_date').val());
	var endDate = new Date($('end_date').val());

	if (startDate > endDate){
		alert("End date should be greater than Start date");
		document.getElementById("end_date").value = "";
	}
}