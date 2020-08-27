<p class="text-xl lg:text-2xl p-4 lg:p-8 my-8 italic rounded-lg bg-blue-100 border-b-2 border-highlightBlue">
    I've been programming in PHP now for almost 10 years and if there is one thing I learned over this period, it's that
    <b>readability</b> and
    <b>simplicity</b> are the keys for maintainable and sustainable code. These are my goals when refactoring and is why
    I see refactoring as one of my main skills today. In this post, I share with you my refactoring practices for PHP.
</p>

<p>Refactoring is the process of modifying and restructuring code without changing its functionality. When I first heard
    about it, I was like:
    <code>Why would anyone do that?</code> It took some years until I fully understand the concept and that working code
    is not always good code too. So with refactoring you are able to make working code better, and what better means is
    something you have to define yourself.</p>

<p>In the following examples, I will show you how I define better code.</p>

<h2>#1 - Be Expressive</h2>

<p>This might be an easy tip, but writing expressive code can improve it a lot. Give your variables and methods good names
    which describe what is happening. But then it might not be that easy because developers also say <code>naming</code>
    is one of the hardest things in programming. 🤷‍</p>

<div class="blognote"><strong>Note:</strong> Make sure to hit the "Show Comments" button on the code examples to get
    details about why we changed the code.
</div>

<h3>Example #1 - Naming</h3>
<x-code-tab code-name="expressive-code-example-1"></x-code-tab>

<h3>Example #2 - Naming</h3>
<x-code-tab code-name="expressive-code-example-2"></x-code-tab>

<h3>Example #3 - Extracting</h3>
<x-code-tab code-name="expressive-code-example-3"></x-code-tab>

<h3>Example #4 - Extracting</h3>
<x-code-tab code-name="expressive-code-example-4"></x-code-tab>


<h2>#2 - Return Early</h2>

<p>The concept of <code>early returns</code> refers to a practice where we try to void nesting by
    breaking a structure down to specific actions. In return we will get a more linear code which is
    much easier to grasp. Every case is separated and good to read by itself. Don't be afraid of using
    multiple return statements.</p>

<h3>Example #1</h3>
<x-code-tab code-name="early-return-example-1"></x-code-tab>

<h3>Example #2</h3>
<x-code-tab code-name="early-return-example-2"></x-code-tab>

<div class="blognote"><strong>Note:</strong> Don't be afraid of using multiple return statements.</div>
