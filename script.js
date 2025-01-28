const keys = document.querySelectorAll('.key'); // Select all the buttons from the calculator

        let $Par = 1; // 1 = Open Parentheses
                      // 2 = Close Parentheses
                      // 3 = Parentheses inside another

        let expression = '0'; // Initialize the expression as '0'

        const maxLength = 16; // Maximum number of characters allowed in the expression

        keys.forEach((button)=>{ // Loop over each button
            button.addEventListener('click', () => {
                const value = button.value; // Get the value from the value of each button

                const lastElement = expression[expression.length - 1]; // Get the last element inserted in the let

                if (value === "=") { // Submit the operation
                    const openPar = (expression.match(/\(/g) || []).length; // Get the number of open parenthesis inserted in the count
                    const closePar = (expression.match(/\)/g) || []).length; // Get the number of close parenthesis inserted in the count

                    if (openPar > closePar) { // Verify if the number of open parethesis is the same of close parenthesis
                        parToClose = openPar - closePar; // Finds the difference in the numbers 
                        for(let i = 1; i <= parToClose; i++){ // Close the parenthesis that has been not
                            expression += ')'; 
                        }
                        
                    }
                    try {
                        expression = eval(expression); // Perform the calculation
                        $Par = 1; // Returns the variable to beginning 
                         
                        expression = expression.toString(); // Turn the expression into a text

                        if (expression.length > maxLength) { // Ensure that the result doesn't exceed the maximum allowed length
                        expression = expression.slice(0, maxLength); // Truncate the expression if it exceeds the limit
                        }
                    } catch (e) {
                        expression = "Error"; // If the program cant solve or understand the code, the error message is shown
                    }


                } else if (value === "C"){ // Submit the clean in operation
                    expression = '0'; // Turn back the value of expression to 0
                } else if (value === "B"){ // Submit the backspace in operation
                    if (expression.length > 1){ // Verify if there's some insert in operation
                        expression = expression.slice(0, -1); // Delete the last number
                    } else {
                        expression = '0'; // Turn back the value of expression to 0
                    }
                } else {
                    if (expression === '0'){ // Verify if there's no insert
                        if (value === "P"){ // Verfify if the value inserted is P
                            if ($Par == 1){ // Verify whats is the value of variable Par
                                expression = '(';
                                $Par = 2; // Turn the state of Par to opened
                            }
                        } else if (value === ".") { // Verify if the input is a decimal point
                            if (lastElement === ".") { // If the last character is a decimal point, do nothing
                                return;
                            }
                            const lastNumber = expression.split(/[\+\-\*\/\(\)]/).pop(); // Split the expression to find the last number
                            if (!lastNumber.includes(".")) { // Verify if the last number doesn't countain a decimal point
                                expression += value; // Insert the decimal point into expression
                            }
                        } else {  
                            expression = value; // Replace the expression with the current value
                        }
                    } else {
                        if (expression.length < maxLength) { // Verify if the expression is shorter than the max length
                            if (value === "P") { // Submit the P in operation
                                if ($Par == 1) { // Verify whats is the value of variable Par
                                    expression += '(';
                                    $Par = 2; // Turn the state of Par to opened
                                } else if ($Par == 3) { // Verify if the operation is inside parentheses
                                    expression += ')';
                                    $Par = 2; // Turn the state of Par to opened
                                } else if ($Par == 2) { // Verify if parentheses are open and decide to close or open a new set of parentheses
                                    if (lastElement === "+" || lastElement === "-" || lastElement === "*" || lastElement === "/" || lastElement === "(") {
                                        expression += '('; // If the last character is an operator or an open parentheses open a new set of parentheses
                                        $Par = 3; // Turn the state of Par to inside of another parentheses
                                    } else {  
                                        expression += ')'; // Close the current parentheses
                                        $Par = 1; // Reset to no parentheses open
                                    }
                                }
                            } else {  
                                if ((value === "+" || value === "-" || value === "*" || value === "/") 
                                    && (lastElement === "+" || lastElement === "-" || lastElement === "*" || lastElement === "/")) { 
                                    expression = expression.slice(0, -1) + value; // Compare the new to the last operator and replace it
                                } else {
                                    expression += value; // Just add the value to the expression
                                }
                            }
                        } else {
                            alert("Você só pode inserir 16 dígitos!"); // Alert if the user tries to exceed the max length
                        }
                    }
                }
                document.getElementById('insert').textContent = expression; // Update the expression on the screen
            });
        });
        
        