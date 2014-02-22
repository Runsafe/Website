<?php
	class KW_DependencyInjector
	{
		/**
		 * Registers a class to be used by the dependency injector.
		 *
		 * @param string $class_name The name of the class to add.
		 */
		public function addComponent($class_name)
		{
			if (!array_key_exists($class_name, $this->classes))
				$this->classes[$class_name] = NULL;
		}

		/**
		 * Returns a constructed component from the dependency injector.
		 *
		 * @param string $class_name The name of the class to return.
		 * @return object The object requested with dependencies injected.
		 * @throws KW_ClassDependencyException
		 */
		public function getComponent($class_name)
		{
			if (!array_key_exists($class_name, $this->classes))
				throw new KW_ClassDependencyException($class_name, 'Class %s has not been added to the injector');

			$object = $this->classes[$class_name];
			return $object !== NULL ? $object : $this->constructComponent($class_name);
		}

		/**
		 * Returns a fully constructed object using components available to the injector.
		 *
		 * @param string $class_name The class to use when building the object.
		 * @return object A fully constructed instance of the component.
		 * @throws KW_ClassDependencyException
		 */
		private function constructComponent($class_name)
		{
			$class = new ReflectionClass($class_name);

			if (!$class->isInstantiable())
				throw new KW_ClassDependencyException($class_name, 'Class %s cannot be instantiated');

			$to_inject = Array();
			$constructor = $class->getConstructor();
			foreach ($constructor->getParameters() as $parameter)
			{
				$parameter_class = $parameter->getClass();
				if ($parameter_class === NULL)
					throw new KW_ClassDependencyException($class_name, 'Constructor for %s contains parameters with an undefined class');

				$parameter_class_name = $parameter_class->getName();
				if ($parameter_class_name === $class_name)
					throw new KW_ClassDependencyException($class_name, 'Cyclic dependency when constructing %s');

				$to_inject[] = $this->getComponent($parameter_class_name);
			}

			$object = $class->newInstanceWithoutConstructor();
			call_user_func_array(array($object, '__construct'), $to_inject);

			return $object;
		}

		/**
		 * @var object[]
		 */
		private $classes = Array();
	}
?>