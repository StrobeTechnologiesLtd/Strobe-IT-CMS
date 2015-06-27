Notation Notes & Understanding
==============================

All classes are written using UML which stands for "Unified Modelling Language", this
language / notation is great for programming and getting a quick understanding to what
people are doing and how they are doing it.

Unfortunately not everyone is taught this when learning OOP (Object-Oriented Programming)
so I have put together a quick guide below: -


Attributes
----------
The full notation of an attribute is

[visibility] name [multiplicity] [: type] [= initial-value] [{property-string}]

The rectangular brackets are optional items.
visibility			PUBLIC (shown with a +)		Means that the object of any class can use the given attribute or operation.
					PROTECTED (#)				Means that only objects that belong to the subclasses of the given class can use
					PRIVATE (-)					Means that only objects belonging to the class itself can use
type				this is the type, eg string, int etc
initial-value		The default / starting value of the attribute
{property-string}	changeable					Can change the value of the attribute (Default if not specified)
					addOnly						Can add values for attribute but cannot change existing
					frozen						Cannot add or change

EXAMPLE
	+ID: int {frozen}
	+emailAddress: string
	+password: string = 1234


Operations
----------
The full notation of an attribute is

[visibility] name [(parameter-list)] [: returnType]

The rectangular brackets are optional items.
visibility			PUBLIC (shown with a +)		Means that the object of any class can use the given attribute or operation.
					PROTECTED (#)				Means that only objects that belong to the subclasses of the given class can use
					PRIVATE (-)					Means that only objects belonging to the class itself can use
returnType			this is the type, eg string, int, boolean or Void (void = nothing returned)