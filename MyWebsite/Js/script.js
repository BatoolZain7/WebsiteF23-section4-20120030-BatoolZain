let previewContainter = document.querySelector('.products-preview');
let previewBox = document.querySelectorAll('.preview');

document.querySelectorAll('.menu .box').forEach(product =>{
    product.onclick = () =>{
        previewContainter.style.display='flex';
        let name = product.getAttribute('name');
        previewBox.forEach(preview =>{ 
            let target = preview.getAttribute('name');
            if(name == target){
                preview.classList.add('active');
            }
        })
    }
})

previewBox.forEach(close =>{
    close.querySelector('.fa-times').onclick=()=>{
        close.classList.remove('active');
        previewContainter.style.display='none';
    }
})