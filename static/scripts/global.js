function context(obj, func)
{
	var localArguments = [];
	for (var argIndex in arguments)
		localArguments[argIndex] = arguments[argIndex];
	localArguments = localArguments.slice(2);

	return function()
	{
		obj[func](this, arguments, localArguments);
	};
}