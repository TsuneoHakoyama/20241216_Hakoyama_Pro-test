const inputDate = document.getElementById('date-input');
const displayDate = document.getElementById('date-confirm');
inputDate.onchange = function () {
    const selectedDate = inputDate.value;
    displayDate.textContent = selectedDate || 'None'
};

const inputTime = document.getElementById('time-input');
const displayTime = document.getElementById('time-confirm');
inputTime.onchange = function () {
    const selectedTime = inputTime.value;
    displayTime.textContent = selectedTime || 'None'
};

const inputNumber = document.getElementById('number-input');
const displayNumber = document.getElementById('number-confirm');
inputNumber.onchange = function () {
    const selectedNumber = inputNumber.options[inputNumber.selectedIndex].textContent;
    displayNumber.textContent = selectedNumber || 'None'
};
