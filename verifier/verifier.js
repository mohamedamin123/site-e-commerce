function moveToNextInput(input, index) {
    if (input.value.length === input.maxLength) {
        if (index < 6) {
            document.getElementById('input' + (index + 1)).focus();
        }
    } else if (input.value.length === 0 && index > 1) {
        document.getElementById('input' + (index - 1)).focus();
    }
}