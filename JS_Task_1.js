// массив оценок
let comments_arr = [];
// количество оценок в массиве
const size_arr = 4;
//оценка с max вхождениями
let current_comment = 0;
//максимальное кол-во вхождений оценки
let max_entry_comment = 0;
//кол-во вхождений оценки
let entry_comment_counter = 0;
//ворачивает рандомное число в диапозоне 1-5
function getRandomNumber(min, max) { return Math.floor(Math.random() * (max - min + 1)) + min; }
//заполнение массива рандомными числами
for (let i = 0; i < size_arr; i++) comments_arr.push(getRandomNumber(1, 5));

const Colors = {
    1: "black",
    2: "red",
    3: "yellow",
    4: "white",
    5: "green"
}
console.log("Оценки отзывов (1-5)");
for (let i = 0; i < size_arr; i++) console.log(comments_arr[i] + " ");

for (let i = 0; i < size_arr; i++) {
    entry_comment_counter = 0;

    for (let j = 0; j < size_arr; j++)  if (comments_arr[i] == comments_arr[j]) entry_comment_counter++;

    if (entry_comment_counter = max_entry_comment) {
        max_entry_comment = entry_comment_counter;
        current_comment = comments_arr[i];
    }
}

if (current_comment in Colors) console.log("Самая встречающаяся оценка: " + current_comment + " цвет: " + Colors[current_comment]);

else console.log("нет такой");
