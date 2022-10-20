const date = new Date();
const accurate_current_month=date.getMonth();
const accurate_current_year=date.getFullYear();
const today=date.getDate();

document.getElementById('display_date').innerHTML='Today: '+date.toDateString();

function calender(){

    const day_in_month = document.getElementById('days');
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
    document.getElementById('display_year').innerHTML=date.getFullYear();

    let previous_month_days='';

    for(let d = month_week_day_first; d >= first_day; d--){
        previous_month_days += `<div class="last_month_days" onclick="this_is_clicked(this)">${previous_month_last_day-d+1}</div>`;
    }

    let current_month_days='';
   
    for(let d = first_day; d <= current_month_last_day; d++){
        
        if(d==today & accurate_current_year==date.getFullYear() & accurate_current_month==date.getMonth()){
            current_month_days += `<div class="today" onclick="this_is_clicked(this)">${d}</div>`;
        }
        else{
            current_month_days += `<div class="current_month_days" onclick="this_is_clicked(this)">${d}</div>`;
        }
    }
    console.log(current_month_days);

    let next_month_days = ''

    for(let d =first_day; d <=days_per_week-month_week_day_last-1; d++){
        next_month_days += `<div class="next_month_days" onclick="this_is_clicked(this)">${first_day+d-1}</div>`;
    }

    day_in_month.innerHTML=previous_month_days + current_month_days + next_month_days;

    document.getElementById('display_date2').innerHTML='Today: '+date.toDateString();
    
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

let all_days=document.getElementById('days').children;

function this_is_clicked(y){
    for(x=0;x<all_days.length;x++){
        if (all_days[x].className=='bg_yellow_1'){
            all_days[x].className='current_month_days';
        }
        else if (all_days[x].className=='bg_yellow_2'){
            all_days[x].className='last_month_days';
        }
        else if (all_days[x].className=='bg_yellow_3'){
            all_days[x].className='next_month_days';
        }
    }

    if(y.className != 'today' & y.className =='current_month_days'){
        y.className='bg_yellow_1';
    }
    else if(y.className != 'today' & y.className !='last_month_days'){
        y.className='bg_yellow_2';
    }
    else if(y.className != 'today' & y.className !='next_month_days'){
        y.className='bg_yellow_3';
    }
}

/*const slot = document.querySelector('.slot');
const booking = "This is booking slot";
var y=10
let available_slot=""
for(let x=1;x<=y;x++){
    available_slot += `<div class="available_slot")">${booking}</div>`;
    slot.innerHTML=available_slot;
}*/
