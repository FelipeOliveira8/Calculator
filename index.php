<html>
    <head>
        <title> Calculator </title>
        <link rel="stylesheet" type="text/css" href="style.css"> 
    </head>   
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
                        <button class="key" value="P">( )</button>
                        <button class="key" value="0">0</button>
                        <button class="key" value=".">.</button>
                    </div>
                    <div class="keysRight">
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
        const keys = document.querySelectorAll('.key');

        const maxLength = 16;

        let $Par = 1; // 1 = true (open Parentheses)
                      // 2 = false (close Parentheses)
                      // 3 = Parentheses inside another

        let expression = '0';

        keys.forEach((button)=>{
            button.addEventListener('click', () => {
                const value = button.value;

                const lastElement = expression[expression.length - 1];

                if (value === "=") {
                    const openPar = (expression.match(/\(/g) || []).length;
                    const closePar = (expression.match(/\)/g) || []).length;

                    if (openPar > closePar) {
                        expression += ')';
                    }

                    try {
                        expression = eval(expression);
                        $Par = 1;
                         
                        expression = expression.toString();

                        if (expression.length > maxLength) {
                        expression = expression.slice(0, maxLength);
                        }
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
                    if (expression === '0'){
                        if (value === "P"){
                            if ($Par == 1){
                                expression = '(';
                                $Par = 2;
                            }
                        } else if (value === "."){
                            if (lastElement === ".") {
                                return;
                            }
                            const lastNumber = expression.split(/[\+\-\*\/\(\)]/).pop();

                            if (!lastNumber.includes(".")) {
                                expression += value;
                            }
                        } else {  
                            expression = value;
                        }   
                    } else {
                        if (expression.length < maxLength){
                            if (value === "P"){
                                if ($Par == 1){
                                    expression += '(';
                                    $Par = 2;
                                } else if ($Par == 3){
                                    expression += ')';
                                    $Par = 2;
                                } else if ($Par == 2){
                                    if (lastElement === "+" || lastElement === "-" || lastElement === "*" || lastElement === "/" || lastElement === "("){
                                        expression += '(';
                                        $Par = 3;
                                    } else {  
                                        expression += ')';
                                        $Par = 1;
                                    }
                                }
                            } else {  
                                if ((value === "+" || value === "-" || value === "*" || value === "/") 
                                && 
                                (lastElement === "+" || lastElement === "-" || lastElement === "*" || lastElement === "/"))
                                {
                                    expression = expression.slice(0, -1) + value;
                                } else {
                                expression += value;
                                }
                            }      
                        } else {
                            alert("Você só pode inserir 16 dígitos!");
                        }
                    }
                }
                document.getElementById('insert').textContent = expression;
            });
        });
    </script>
</html>