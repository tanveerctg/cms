

document.querySelector('.selectAllBox').addEventListener('click',function(){

    if(document.querySelector('.selectAllBox').checked==true){
      document.querySelectorAll('.checkbox').forEach(x=>x.checked=true);
    }else{
      document.querySelectorAll('.checkbox').forEach(x=>x.checked=false);
    }
  
  });

