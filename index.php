<html>
    <head>
        <title> Calculator </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    <head>   
    <body>
        <section>
            <div class="calculatorMain">
                <div class="display">
                    <span id="insert">0</span>
                </div>
                <div class="keys">
                    <div class="keysLeft">
                        <button class="key" >( )</button>
                        <button class="key" valueKey="÷">÷</button>
                        <button class="key" valueKey="x">x</button>
                        <button class="key" valueKey="7">7</button>
                        <button class="key" valueKey="8">8</button>
                        <button class="key" valueKey="9">9</button>
                        <button class="key" valueKey="4">4</button>
                        <button class="key" valueKey="5">5</button>
                        <button class="key" valueKey="6">6</button>
                        <button class="key" valueKey="1">1</button>
                        <button class="key" valueKey="2">2</button>
                        <button class="key" valueKey="3">3</button>
                        <button class="key" valueKey=",">,</button>
                        <button class="key" valueKey="0">0</button>
                        <button class="key" valueKey=".">.</button>
                    </div>
                    <div class="KeysRight">
                        <button class="key clear" id='kc'>C</button>
                        <button class="key" valueKey='-'>-</button>
                        <button class="key" valueKey='+'>+</button>
                        <button class="key result">=</button>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script>
        const keys = document.querySelectorAll('.Key');

        keys.forEach((Key)=>{
            Key.addEventListener('click', () => {
                const value = Key.getAttribute('valueKey');
                console.log(value)
                document.getElementById('insert').textContent = value;
            });
        });
    </script>
</html>