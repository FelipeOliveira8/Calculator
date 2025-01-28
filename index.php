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
                        
                        <button class="key backspace" value="B"><</button>
                        <button class="key" value="/">÷</button>
                        <button class="key" value="*">x</button>
                        <button class="key" value="7">7</button>
                        <button class="key" value="8">8</button>
                        <button class="key" value="9">9</button>
                        <button class="key" value="4">4</button>
                        <button class="key" value="5">5</button>
                        <button class="key" value="6">6</button>
                        <button class="key" value="1">1</button>
                        <button class="key" value="2">2</button>
                        <button class="key" value="3">3</button>
                        <button class="key" >( )</button>
                        <button class="key" value="0">0</button>
                        <button class="key" value=",">,</button>
                    </div>
                    <div class="KeysRight">
                        <button class="key clear" value='C'>C</button>
                        <button class="key" value='-'>-</button>
                        <button class="key" value='+'>+</button>
                        <button class="key result" value='='>=</button>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script>
        const keys = document.querySelectorAll('.Key');

        const maxLength = 12;

        let = expression = '0';

        keys.forEach((button)=>{
            button.addEventListener('click', () => {
                const value = button.value;

                if (value === "=") {
                    try{
                        expression = eval (expression);
                    } catch (e) {
                        expression = "Error";
                    }
                } else if (value === "C"){
                    expression = '0';
                } else if (value === "B"){
                    if (expression.length > 1){
                        expression = expression.slice(0, -1);
                    } else {
                        expression = '0';
                    }
                } else {
                    if (expression == 0){
                        expression = value;
                    } else {
                        if (expression.length < maxLength){
                            expression += value;
                        } else {
                            alert("Você só pode inserir 12 dígitos!");
                        }
                    }
                }

                
                document.getElementById('insert').textContent = expression;
            });
        });
    </script>
</html>