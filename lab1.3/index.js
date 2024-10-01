const numbers = [5, 25, 13, 8, 45, 6, 11];

// General sorting function
function sortNumbers(array, order = "asc") {
  let sorted = [...array];
  for (let i = 0; i < sorted.length; i++) {
    for (let j = i + 1; j < sorted.length; j++) {
      if (
        (order === "asc" && sorted[i] > sorted[j]) ||
        (order === "desc" && sorted[i] < sorted[j])
      ) {
        let temp = sorted[i];
        sorted[i] = sorted[j];
        sorted[j] = temp;
      }
    }
  }
  return sorted;
}

// Show maximum number
function showMax() {
  const sorted = sortNumbers(numbers, "desc"); // Sort in descending order
  const max = sorted[0]; // Max is the first element in descending order
  document.getElementById("result").innerText = "Max: " + max;
}

// Show minimum number
function showMin() {
  const sorted = sortNumbers(numbers, "asc"); // Sort in ascending order
  const min = sorted[0]; // Min is the first element in ascending order
  document.getElementById("result").innerText = "Min: " + min;
}

// Sort from smallest to largest
function sortMinToMax() {
  const sorted = sortNumbers(numbers, "asc"); // Sort in ascending order
  document.getElementById("result").innerText =
    "Sorted Min to Max: " + sorted.join(", ");
}

// Sort from largest to smallest
function sortMaxToMin() {
  const sorted = sortNumbers(numbers, "desc"); // Sort in descending order
  document.getElementById("result").innerText =
    "Sorted Max to Min: " + sorted.join(", ");
}
