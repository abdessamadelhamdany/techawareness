1. What is unit testing

Unit testing is a software testing method by which individual units of source code
are tested to determine whether they are fit for use \[wikipedia\].

Which means we're not testing the user flow, not testing controllers where maybe
we're using lots of different units to do what we need.

But we're testing individual units, that maybe a class, a function that do one job
which gives us the confidence to use these units of code without worrying that an
individual unit may not work later on.

After unit testing, we can look into different types of testing like Acceptance testing
of business logic, which will test the flow throught what we've built, and make sure
that it works as expected from the user point of view.

We can also do Integration testing, like testing a controller giving the expected responses
when given some input.

In most cases we start with unit testing which is pretty important part of our project, making
sure that each unit of code works as expected, give us confidence that they will be working as
well when we bring them together.

The goal of unit testing is "to isolate each part of the program and show that individual parts
are correct \[wikipedia\].

Also it worth to mention, a pattern of writting code which is Test-driven development (or TDD), where we
write tests before code.
Which give us the opportinity to think about how we want thing to work, and what cases our unit of code
will handle, before writing any code at all.

## Practical Examples

Now that we have an idea about what unit testing is, Let's learn how we can start writing unit tests
for the DCS project.

I've tried to do a similar, but simplified version of what we have in DCS, so its easy for you to practice
this knowledge into your next unit test.

But before we open VSCode and start looking at code, Let's take a look, at what concepts we'll try to grasp
in this techawareness kind of workshop.

2. Assertions with Examples
3. FunctionMocker with Examples
   1. Simple function (Doesn’t need a provider)
   2. Complex function (Has multiple use cases)
4. Mockery with Examples
   1. Simple method (Doesn’t need a provider)
   2. SemiComplex method (Has multiple cases, but uses only other methods as its dependencies)
   3. Complex method (Has multiple cases, including other functions as its dependencies)
5. DataProviders with Examples
   1. Using Array syntax
   2. Using Generator syntax
   3. How to benefit from the MockCommonAssertion::doMyMockAssertions helper
   4. What should we give as arguments to a function/method
   5. What should a mock function/method return
   6. How to benefit from the CommonTestHelpersFn::dumpToJson helper
   7. Tips on reusable information
      1. Similar test case but not that similar
      2. Same values used more than once
      3. Mock functions values
6. Function Cases Extraction with Examples
7. Practical Examples of Unit Testing Functions
   1. A Function that has no dependencies
   2. A Function that has functions as dependencies
   3. A Function that has classes as dependencies
   4. A Function that throws an exception
   5. A Function that has a loop
   6. A Recursive Function (follow/control the flow until its done)
8. Practical Examples of Unit Testing Classes
   1. Public: Property, Method, Constructor
   2. Private: Property, Method, Constructor
9. Q/A discussion
