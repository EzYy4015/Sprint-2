const date = new Date();
const accurate_current_month=date.getMonth();
const accurate_current_year=date.getFullYear();

function calender(){

    const day_in_month = document.querySelector('.days');
    const first_day = new Date(date.getFullYear(), date.getMonth() + 1, 1).getDate();
    const current_month_last_day = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    const previous_month_last_day = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
    const month_week_day_first = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
    const month_week_day_last = new Date(date.getFullYear(), date.getMonth()+1, 0).getDay();
    const days_per_week = 7;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    document.getElementById('display_month').innerHTML=months[date.getMonth()];

    document.getElementById('display_date').innerHTML=date.toDateString();

    let previous_month_days='';

    for(let d = month_week_day_first; d >= first_day; d--){
        previous_month_days += `<div class="last_month_days">${previous_month_last_day-d+1}</div>`;
    }

    let current_month_days='';
   
    for(let d = first_day; d <= current_month_last_day; d++){
        current_month_days += `<div class="current_month_days">${d}</div>`;
    }

    let next_month_days = ''

    for(let d =first_day; d <=days_per_week-month_week_day_last-1; d++){
        next_month_days += `<div class="next_month_days">${first_day+d-1}</div>`;
        day_in_month.innerHTML=previous_month_days + current_month_days + next_month_days;
    }
}

calender();

const left_button = document.getElementById('previous_button');
const right_button = document.getElementById('next_button');
const today_button = document.getElementById('today_button');

function decrease_month(){
    date.setMonth(date.getMonth() - 1)
    calender();
}

function increase_month(){
    date.setMonth(date.getMonth() + 1)
    calender();
}

function go_today_date(){
    date.setMonth(accurate_current_month);
    date.setFullYear(accurate_current_year);
    calender();
}

left_button.addEventListener('click',decrease_month);
right_button.addEventListener('click',increase_month);
today_button.addEventListener('click',go_today_date);
