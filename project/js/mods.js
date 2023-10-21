var slideIndex;
  var urlParams = new URLSearchParams(window.location.search);
  var startSlideParam = urlParams.get('startSlide');

  if (startSlideParam !== null) {
    slideIndex = parseInt(startSlideParam, 10);
}
 else {
  slideIndex = 1; // Default value if no parameter is provided in the URL
  }

    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("slide-container");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "flex";  
      dots[slideIndex-1].className += " active";
    }
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("slide-container");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "flex";  
      dots[slideIndex-1].className += " active";
    }


google.charts.load('current', {'packages':['corechart']});
function createCharacterChart(containerId, characterData) {
  var screenLength = window.outerWidth;
  var x = screenLength >= 1200 ? 600 : 500;

  var data = google.visualization.arrayToDataTable([
    ['ability', 'score', { role: 'style' }, { role: 'annotation' }],
    ['Strength', characterData.Strength, 'darkred', 'Strength'],
    ['Dexterity', characterData.Dexterity, 'blue', 'Dexterity'],
    ['Constitution', characterData.Constitution, 'green', 'Constitution'],
    ['Intelligence', characterData.Intelligence, 'purple', 'Intelligence'],
    ['Wisdom', characterData.Wisdom, 'orange', 'Wisdom'],
    ['Charisma', characterData.Charisma, 'teal', 'Charisma'],
  ]);

  var options = {
    'width': x,
    'height': 300,
    bar: {
      groupWidth: '100%',
    },
    animation: {
      duration: 4000,
      easing: 'out',
      startup: true,
    },
    hAxis: {
      viewWindow: {
        min: 5,
        max: 20,
      },
      textStyle: {
        fontSize: 14,
        color: 'aliceblue',
        fontName: 'Lato',
      },
      gridlines: {
        color: 'black',
        count: 5,
      },
    },
    vAxis: {
      textStyle: {
        fontSize: 12,
        color: 'aliceblue',
        fontName: 'Lato',
      },
    },
    backgroundColor: { fill: 'transparent' },
    legend: { position: 'none' },
    chartArea: { width: '90%', left: '100' },
  };

  var chart = new google.visualization.BarChart(document.getElementById(containerId));
  chart.draw(data, options);
}
$(document).ready(function() {
    $('.mod-chart').each(function () {
      var character = $(this).data('character-name');
      var id = $(this).attr('id');
      console.log(character);
    $.ajax({
      url: 'getCharacterData.php', 
      method: 'POST',
      dataType: 'json',
      data: {character:character},
      success: function(data) {
         console.log(data);

          createCharacterChart(id, data); 
      },
  });
    
 google.charts.setOnLoadCallback(drawChartIsaac);


 function drawChartIsaac() {
var screenLength = window.outerWidth;
   if (screenLength >= 1200)
     {
       x = 600;
     }
   else {
     x = 500;
   }
   // Create the data table.
   var data = google.visualization.arrayToDataTable([
    ['ability', 'score', { role: 'style' }, { role: 'annotation' }], 
    ['Strength', 17, 'darkred', 'Strength'], 
    ['Dexterity', 18, 'blue', 'Dexterity'], 
    ['Constitution', 10, 'green', 'Constitution'], 
    ['Intelligence', 17, 'purple', 'Intelligence'], 
    ['Wisdom', 10, 'orange', 'Wisdom'], 
    ['Charisma', 12, 'teal', 'Charisma'], 
  ]);
   var optionsIsaac = {
                  'width':x,
                  'height':300,
     bar: {
groupWidth: '100%',

             
},
           animation:{
   duration: 4000,
   easing: 'out',
                 startup: true,
 },
     
     hAxis: {
         viewWindow: {
   min: 5,
   max: 20,},
       textStyle : {
       fontSize: 14,
         color: 'aliceblue',
         fontName: 'Lato',
  
   },
gridlines: {
   color: 'black',
 count:5
},
       
},
vAxis:
{
  textStyle : {
    fontSize: 12,
      color: 'aliceblue',
    fontName: 'Lato'
  },
},
backgroundColor: { fill:'transparent' },
     legend: {position: 'none'}
                 };
                 options = {
                  chartArea: {width: "90%", left: "100"},
              }     
   // Instantiate and draw our chart, passing in some options.
   var chartIsaac = new google.visualization.BarChart(document.getElementById('isaac-chart'));
   chartIsaac.draw(data, optionsIsaac);
 }
 google.charts.setOnLoadCallback(drawChartKale);

 function drawChartKale() {
var screenLength = window.outerWidth;
   if (screenLength >= 1200)
     {
       x = 600;
     }
   else {
     x = 500;
   }
   // Create the data table.
   var data = google.visualization.arrayToDataTable([
    ['ability', 'score', { role: 'style' }, { role: 'annotation' }], 
    ['Strength', 16, 'darkred', 'Strength'], 
    ['Dexterity', 17, 'blue', 'Dexterity'], 
    ['Constitution', 18, 'green', 'Constitution'],
    ['Intelligence', 11, 'purple', 'Intelligence'], 
    ['Wisdom', 9, 'orange', 'Wisdom'],
    ['Charisma', 12, 'teal', 'Charisma'], 
  ]);
  

   // Set chart options
   var optionsKale = {
                  'width':x,
                  'height':300,
     bar: {
groupWidth: '100%',

             
},
           animation:{
   duration: 4000,
   easing: 'out',
                 startup: true,
 },
     
     hAxis: {
         viewWindow: {
   min: 5,
   max: 20,},
       textStyle : {
       fontSize: 14,
         color: 'aliceblue',
         fontName: 'Lato',
  
   },
gridlines: {
   color: 'black',
 count:5
},
       
},
vAxis:
{
  textStyle : {
    fontSize: 12,
      color: 'aliceblue',
    fontName: 'Lato'
  },
},
backgroundColor: { fill:'transparent' },
     legend: {position: 'none'}
                 };
                 options = {
                  chartArea: {width: "90%", left: "100"},
              }     
 
   var chartKale = new google.visualization.BarChart(document.getElementById('kale-chart'));
   chartKale.draw(data, optionsKale);
 }
 google.charts.setOnLoadCallback(drawChartRecorder);


 function drawChartRecorder() {
var screenLength = window.outerWidth;
   if (screenLength >= 1200)
     {
       x = 600;
     }
   else {
     x = 500;
   }
   // Create the data table.
   var data = google.visualization.arrayToDataTable([
    ['ability', 'score', { role: 'style' }, { role: 'annotation' }], 
    ['Strength', 10, 'darkred', 'Strength'], 
    ['Dexterity', 17, 'blue', 'Dexterity'], 
    ['Constitution', 11, 'green', 'Constitution'], 
    ['Intelligence', 17, 'purple', 'Intelligence'],
    ['Wisdom', 15, 'orange', 'Wisdom'], 
    ['Charisma', 15, 'teal', 'Charisma'], 
  ]);
  

   // Set chart options
   var optionsRecorder = {
                  'width':x,
                  'height':300,
     bar: {
groupWidth: '100%',

             
},
           animation:{
   duration: 4000,
   easing: 'out',
                 startup: true,
 },
     
     hAxis: {
         viewWindow: {
   min: 5,
   max: 20,},
       textStyle : {
       fontSize: 14,
         color: 'aliceblue',
         fontName: 'Lato',
  
   },
gridlines: {
   color: 'black',
 count:5
},
       
},
vAxis:
{
  textStyle : {
    fontSize: 12,
      color: 'aliceblue',
    fontName: 'Lato'
  },
},
backgroundColor: { fill:'transparent' },
     legend: {position: 'none'}
                 };
                 options = {
                  chartArea: {width: "90%", left: "100"},
              }     

   var chartRecorder = new google.visualization.BarChart(document.getElementById('recorder-chart'));
   chartRecorder.draw(data, optionsRecorder);
 }
 google.charts.setOnLoadCallback(drawChartVienxay);


 function drawChartVienxay() {
var screenLength = window.outerWidth;
   if (screenLength >= 1200)
     {
       x = 600;
     }
   else {
     x = 500;
   }
   // Create the data table.
   var data = google.visualization.arrayToDataTable([
    ['ability', 'score', { role: 'style' }, { role: 'annotation' }], 
    ['Strength', 15, 'darkred', 'Strength'], 
    ['Dexterity', 17, 'blue', 'Dexterity'], 
    ['Constitution', 10, 'green', 'Constitution'], 
    ['Intelligence', 18, 'purple', 'Intelligence'], 
    ['Wisdom', 10, 'orange', 'Wisdom'], 
    ['Charisma', 11, 'teal', 'Charisma'],
  ]);
  

   // Set chart options
   var optionsVienxay = {
                  'width':x,
                  'height':300,
     bar: {
groupWidth: '100%',

             
},
           animation:{
   duration: 4000,
   easing: 'out',
                 startup: true,
 },
     
     hAxis: {
         viewWindow: {
   min: 5,
   max: 20,},
       textStyle : {
       fontSize: 14,
         color: 'aliceblue',
         fontName: 'Lato',
  
   },
gridlines: {
   color: 'black',
 count:5
},
       
},
vAxis:
{
  textStyle : {
    fontSize: 12,
      color: 'aliceblue',
    fontName: 'Lato'
  },
},
backgroundColor: { fill:'transparent' },
     legend: {position: 'none'}
                 };
                 options = {
                  chartArea: {width: "90%", left: "100"},
              }     
   // Instantiate and draw our chart, passing in some options.
   var chartVienxay = new google.visualization.BarChart(document.getElementById('vienxay-chart'));
   chartVienxay.draw(data, optionsVienxay);
 }
   
   

 
 // Load the Visualization API and the corechart package.
 //google.charts.load('current', {'packages':['corechart']});

 // Set a callback to run when the Google Visualization API is loaded.
});
});