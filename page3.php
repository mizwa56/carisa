<div>
    <h1>this is page 3</h1>
</div>

<script>
    var nasoCRA = [
    {
        n: 1,
        question: "What is gender/sex?",
        questionType: "radio",
        options: {
            opt1: [1, "Male"],
            opt2: [2, "Female"]
        }
    },
    {
        n: 2,
        question: "What is race?",
        questionType: "radio",
        options: {
            opt1: [1, "Malay"],
            opt2: [2, "Chinese"]
        }
    }
]

console.log(nasoCRA[0].options.opt1[0]);
</script>