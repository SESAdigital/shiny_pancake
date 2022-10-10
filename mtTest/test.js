const form = document.querySelector('.form')
const duesName = document.querySelector('.duesName')
const trackPayment = document.querySelector('.trackPayment')
const status = document.querySelector('.status')
const amountType = document.querySelector('.amountType')
const amount = document.querySelector('.amount')
const paymentPlan = document.querySelector('.paymentPlan')

const start = document.querySelector('.start')
const end = document.querySelector('.end')


form.addEventListener('submit', (e)=> {
    e.preventDefault()

    // alert('hy')

    // const data = { duesName: duesName.value };

    fetch('http://127.0.0.1:8000/api/makePayment', {
    method: 'POST', // or 'PUT'
    headers: {
        'Accept':'application/json',
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        duesName: duesName.value,
        trackPayment: trackPayment.value,
        status: status.value,
        amountType: amountType.value,
        amount: amount.value,
        paymentPlan: paymentPlan.value,
        start: start.value,
        end: end.value,

        user_id: 1

    }),
    }).then((data) => {
        return data.json(); 
    }).then((datajson) =>{
      

        console.log(datajson);
    })
    // alert(duesName.value)


})
