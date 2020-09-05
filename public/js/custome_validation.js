
function checkIfEmpty(field) {
	if (isEmpty(field.value.trim())) {
		setInvalid(field, `${field.name} must not be empty`)
		return true;
	} else {
		setValid(field);
		return false;
	}
}


function isEmpty(value) {
	if (value === '') return true;
	return false;
}

function setInvalid(field, message) {
	field.className = 'form-control is-invalid';
	field.nextElementSibling.innerHTML = message;
}

function setValid(field) {
	field.className = 'form-control is-valid';
	field.nextElementSibling.innerHTML = '';
}

function meetLength(field, min, max) {
	if (field.value.length >= min && field.value.length < max) {
		setValid(field);
		return true;
	} else if (field.value.length < min) {
		setInvalid(field, `${field.name} Must be atlist ${min} Character Long`);
		return false;
	} else {
		setInvalid(field, `${field.name} Must be less than  ${max} Characters`);
		return false;
	}
}

function minmax(field, min, max) {
	if (field.value >= min && field.value < max) {
		setValid(field);
		return true;
	} else if (field.value < min) {
		setInvalid(field, `${field.name} Must be above ${min}`);
		return false;
	} else {
		setInvalid(field, `${field.name} Must be less than  ${max} `);
		return false;

	}
}

function numberonly(field) {
	let number = /^[0-9]+$/;
	if (field.value.match(number)) {
		setValid(field);
		return true;
	}
	else {
		setInvalid(field, `${field.name} Must be a number `);
		return false;

	}
}

function decimalonly(field) {
	let number = /^[-+]?[0-9]+\.[0-9]+$/;
	if (field.value.match(number)) {
		setValid(field);
		return true;
	}
	else {
		setInvalid(field, `${field.name} Must be a Decimal Number `);
		return false;

	}
}
function alllatters(field) {
	let letters = /^[A-Za-z]+$/;
	if (field.value.match(letters)) {
		setValid(field);
		return true;
	}
	else {
		setInvalid(field, `${field.name} Must be a letters `);
		return false;

	}
}