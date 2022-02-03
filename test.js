const splitName = (name) => {
    let words = name.split(" ");
    if (words.length < 2) return words[0][0]
    return `${words[0][0]} ${words[words.length - 1][0]}`
}


console.log(splitName("Rajeev"))
console.log(splitName("Rajeev Kumar LOL"))
