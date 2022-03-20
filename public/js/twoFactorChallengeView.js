$(function () {

    console.log('Funciona');
    const recoveryCard = document.getElementById("recovery-codes-card");
    const codeCard = document.getElementById("code-card");
    
    const buttonShowRecovery = document.getElementById("code-recovery-link");
    const buttonShowCode = document.getElementById("code-link");
    
    buttonShowCode.addEventListener("click", () => {
        codeCard.style.display = "flex";
        recoveryCard.style.display = "none";

        console.log('Click');
    });
    
    buttonShowRecovery.addEventListener("click", () => {
        recoveryCard.style.display = "flex";
        codeCard.style.display = "none";

    });
});