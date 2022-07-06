const btn = document.querySelector('button')
const inputs = document.querySelector('form')
btn.addEventListener('click', () => {

    const name = (inputs.elements["name"].value).trim()
    const email = (inputs.elements["email"].value).trim()
    const msg = (inputs.elements["message"].value.trim())
    const phone = (inputs.elements["phone"].value).trim()
    if (!name.length > 0 || !email.length > 0 || !msg.length > 0 || !phone.length > 0) {
        alert("All fields are mandatory")
        return
    }
    Email.send({
        Host: "smtp.mailtrap.io",
        Username: "c5a72656db2a6c",
        Password: "e0eab83ad45a71",
        To: "xyz@gm.com",
        From: inputs.elements["email"].value,
        Subject: "Contact Us Query By the Customer",
        Body: inputs.elements["message"].value + "<br>" + inputs.elements["name"].value + "<br>" + inputs.elements["phone"].value
    }).then(msg => alert("The email successfully sent"))
})