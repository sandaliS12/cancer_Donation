document.getElementById('tab1').addEventListener('click',
    function(){
    document.getElementById('tab1').classList.remove('active');
    document.getElementById('tab1').classList.add('active');
    document.getElementById('tab2').classList.remove('active');
    document.getElementById('tab3').classList.remove('active');
    document.getElementById('tab4').classList.remove('active');

    document.querySelector('.tab1').style.display = 'inline-block';
    document.querySelector('.tab2').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    });

    document.getElementById('tab2').addEventListener('click',
    function(){
    document.getElementById('tab2').classList.remove('active');
    document.getElementById('tab2').classList.add('active');
    document.getElementById('tab1').classList.remove('active');
    document.getElementById('tab3').classList.remove('active');
    document.getElementById('tab4').classList.remove('active');

    document.querySelector('.tab2').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    });

    document.getElementById('tab3').addEventListener('click',
    function(){
    document.getElementById('tab3').classList.remove('active');
    document.getElementById('tab3').classList.add('active');
    document.getElementById('tab1').classList.remove('active');
    document.getElementById('tab2').classList.remove('active');
    document.getElementById('tab4').classList.remove('active');

    document.querySelector('.tab3').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab2').style.display = 'none';
    document.querySelector('.tab4').style.display = 'none';
    });

    document.getElementById('tab4').addEventListener('click',
    function(){
    document.getElementById('tab4').classList.remove('active');
    document.getElementById('tab4').classList.add('active');
    document.getElementById('tab1').classList.remove('active');
    document.getElementById('tab2').classList.remove('active');
    document.getElementById('tab3').classList.remove('active');

    document.querySelector('.tab4').style.display = 'inline-block';
    document.querySelector('.tab1').style.display = 'none';
    document.querySelector('.tab3').style.display = 'none';
    document.querySelector('.tab2').style.display = 'none';
    });