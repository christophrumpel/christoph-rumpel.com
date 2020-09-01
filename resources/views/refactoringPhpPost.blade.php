<p class="text-xl lg:text-2xl p-4 lg:p-8 my-8 italic rounded-lg bg-blue-100 border-b-2 border-highlightBlue">
    I've been programming in PHP now for almost 10 years and if there is one thing I learned over this period, it's that
    <b>readability</b> and <b>simplicity</b> are the keys for maintainable and sustainable code. Every first attempt to write code should be about <b>making it work</b>. Only after that, you should take some time to refactor. This is when I aim for readability and simplicity. Today I see refactoring as one of my main skills. In this post, I share with you my refactoring practices for PHP.
</p>

<p>Refactoring is the process of modifying and restructuring code without changing its functionality. When I first heard
    about it, I was like:
    <code>Why would anyone do that?</code> It took some years until I fully understand the concept and that working code
    is not always good code too. So with refactoring you are able to make working code better, and what better means is something developers will argue for hours. In the end, you have to define it for yourself.</p>

<p>In the following examples, I will show you how I define better code.</p>

<h2>#1 - Be Expressive</h2>

<p>This might be an easy tip, but writing expressive code can improve it a lot. Always try to make your code self-explaining so that you, your future self or any other developers who stumbles over your code knows what is going on.</p>

<p>But then developers also say <code>naming
    is one of the hardest things in programming.</code> This is one reason why this is not as easy as it sounds. 🤷‍</p>

<div class="blognote"><strong>Note:</strong> Make sure to hit the "Show/Hide Comments" buttons on the code examples to get
    details about why we needed to chang the code.
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

<p>The concept of <code>early returns</code> refers to a practice where we try to avoid nesting by
    breaking a structure down to specific cases. In return, we will get a more linear code which is
    much easier to read and grasp. Every case is separated and good to follow. Don't be afraid of using
    multiple return statements.</p>

<h3>Example #1</h3>
<x-code-tab code-name="early-return-example-1"></x-code-tab>

<h3>Example #2</h3>
<x-code-tab code-name="early-return-example-2"></x-code-tab>

<div class="blognote"><strong>Note:</strong> You sometimes also hear the term "guard-clauses" which is what you can achieve with early returns. You are guarding your method from special conditions.</div>

<h2>#3 - Refactor To Collections</h2>

<p>In PHP, we work a lot with arrays of different data. The available features to handle and transform those arrays are quite limited in PHP and don't provide a good experience while using them. (array_walk, usort, etc.)</p>

<p>To tackle this problem there is this concept of Collection classes, which help you to handle arrays. Most known is the <a href="https://laravel.com/docs/master/collections">implementation in Laravel</a>, where a collection class provides you with dozens of useful features to work with arrays.</p>

<div class="blognote"><strong>Note:</strong> For the following examples, I will use Laravel's collect() helper, but the approach is very similar with other available collection classes from other frameworks or libraries.</div>

<h3>Example #1</h3>
<x-code-tab code-name="collections-example-1"></x-code-tab>



