var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var year = d.getFullYear();
    var today = year+"-"+month+"-"+day;
    $("#date").attr("min",today);

$(function(){



 	$("#createTask").hide();
 
 	$("#create").focus(function(){
        $("#createTask").show();
        $(".main2").addClass("disabled light");
         $(".main1").hide();
          $(".nav").addClass("disabled");
          $(".tasks").addClass("disabled light");
  });


$("#search").blur(function(){
  $(".main2").addClass("enabled");
  $(".main1").addClass("enabled");
  $(".nav").addClass("enabled");
  $(this).val(" ");
});

/*$("#search").focus(function(){
  $(".main2").addClass("disabled light");
        $(".main1").addClass("disabled");
        $(".nav").addClass("disabled");
});
*/
  $("#search").keyup(function(){

        
        var str = $(this).val();
             
    $.get("search.php?str="+str, function(data, status){
    if(data!="")
      $(".main2").html(data);

    });
  });



  $("body").on('click','.cancel',function(){
    	$( "#createTask").hide();
    	$(".main1").addClass("enabled");
  		$(".main2").addClass("enabled");  
      $(".nav").addClass("enabled");  
    })




    $("body").on('click','.cancel',function(){
      /*$(".tasks").addClass("enabled");
      $(".main1").addClass("enabled");
      $(".main2").addClass("enabled");  
      $(".nav").addClass("enabled"); 
      $($(this).parent()).animate({
      
        left:'-=50px',
        top:'-=50px',
        fontSize: '16px',
        
       
      },"slow");*/
        // $(".main2").show();
      location.reload(true); 
    });
 

    // $(".tasks").click(function(){
    //   //alert($(this).text());
    //   $(".main1").addClass("enabled");
    //   $(".main2").addClass("enabled");  
    //     $(".nav").addClass("enabled"); 
    //   $(".tasks").addClass("disabled");
    //   $($(this)).addClass("enabled");
    //   $($(this)).animate({
        
    //     fontSize: '30px',
    //     left:'+=30px',
    //     top:'+=30px'
    //   },"slow");
    // });

    $("body").on('click','.edit',function(){
     //  $text = $(this).parent().text();
      //alert($text);
     //  document.location.href="edit.php?text="+$text;

     var str = $(this).parent().text();
        // alert(str);    
        $.post("edit.php",
          {
            text:str
        },
     function(data, status){
      if(data!="")
        $(".main2").html(data);

    });
    });

    /*$(".label").click(function(clicked){
        var url = "{clicked}.php";

    });*/

/*    $("#savechanges").submit(function(){

      $taskname = $('taskname').val();
      $desc = $('description').val();
      $status = $("#status option:selected").text();
      
      //$date = new Date($('#date').val());
      //alert($date);
      if($taskname=="" || $desc==""||$status=="Not Completed"){
        alert("No changes made!!");
        return false;
      }

    });*/
 $("body").on('click','.savechanges',function(){
  // alert("hjolm");
  // date1=$("#date1").val();
    
 
  //  alert(date1);alert("hoo");
  $.post("savechanges.php",
    {
        taskname:$("#taskname").val(),
        description:$("#description").val(),
        date:$("#date1").val(),
        label:$("#label").val(),
        status :$("#status").val(),
        priority:$("priority").val(),
        pin :$("#pin").val()
    },
    function(data, status){
      //$(".main2").html(data);
        window.location.reload();
    });
});

    $("#newlabel").click(function(){
        $("#new").slideDown("slow");
    });

    $("#done").click(function(){
        var nlabel = $("#input").val(); 
        window.location.href="newlabel.php?labelname="+nlabel; 
    });
  
 
 var index=0;

  $("#add").click(function(){
  index++;
    $("#more").append('<label>What needs to be done?</label><br>\
      <input type="text" name="taskname'+index+'" id="taskname'+index+'" required><br><br>\
      <label>Description</label><br>\
      <textarea name="description'+index+'" id="description'+index+'"></textarea><br><br>');
  });

 $("body").on('submit','#createTask',function(){

      taskname="";
      description="";
      
      for(i=0;i<=index;i++){
            taskname += $("#taskname"+i).val()+"!@#";
            description += $("#description"+i).val()+"!@#";
        }
        //alert(taskname);

    $.post("savetask.php",
      {
        ind:index,
        taskname:taskname,
          description:description,
          duedate:$("#duedate").val(),
          label:$("#label").val(),
          status :$("#status").val(),
          priority:$("priority").val(),
          pin :$("#pin").val()
      },
      function(data, status){
        window.location.reload();
    });
  }); 
 
});