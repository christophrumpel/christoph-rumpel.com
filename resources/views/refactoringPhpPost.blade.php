<p>Refactoring is the process of modifying and restructuring code without changing its functionality. When I first heard
    about it, I was like:
    <code>Why would anyone do that?</code> It took some years until I fully understood the concept and that the working code is not always good. So with refactoring, you can make working code better, and what better means is something developers will argue for hours. In the end, you have to define it for yourself.</p>

<p>In the following examples, I will show you how I define better code. Are you just looking for a specific strategy? Please use the <code>anchor links</code>:</p>
<ul>
    <li><a href="#be-expressive">#1 - Be Expressive</a></li>
    <li><a href="#return-early">#2 - Return Early</a></li>
    <li><a href="#refactor-to-collections">#3 - Refactor To Collections</a></li>
    <li><a href="#consistency">#4 - Consistency</a></li>
</ul>

<h2 id="be-expressive">#1 - Be Expressive</h2>

<p>This might be an easy tip, but writing expressive code can improve it a lot. Always make your code self-explaining so that you, your future self or any other developers who stumble over your code knows what is going on.</p>

<p>But then developers also say <code>naming
        is one of the hardest things in programming.</code> This is one reason why this is not as easy as it sounds. 🤷‍</p>

<div class="blognote"><strong>Note:</strong> Make sure to hit the "Show/Hide Notes" buttons on the code examples to get
    details about why we needed to change the code.
</div>

<h3>Example #1 - Naming</h3>
<x-code-tab code-name="expressive-code-example-1"></x-code-tab>

<h3>Example #2 - Naming</h3>
<x-code-tab code-name="expressive-code-example-2"></x-code-tab>

<h3>Example #3 - Extracting</h3>
<x-code-tab code-name="expressive-code-example-3"></x-code-tab>

<h3>Example #4 - Extracting</h3>
<x-code-tab code-name="expressive-code-example-4"></x-code-tab>


<h2 id="return-early">#2 - Return Early</h2>

<p>The concept of <code>early returns</code> refers to a practice where we try to avoid nesting by breaking a structure down to specific cases. In return, we will get a more linear code, which is much easier to read and grasp. Every case is separated and good to follow. Don't be afraid of using
    multiple return statements.</p>

<h3>Example #1</h3>
<x-code-tab code-name="early-return-example-1"></x-code-tab>

<h3>Example #2</h3>
<x-code-tab code-name="early-return-example-2"></x-code-tab>

<div class="blognote"><strong>Note:</strong> You sometimes also hear the term "guard-clauses" which is what you can achieve with early returns. You are guarding your method from special conditions.</div>

<h2 id="refactor-to-collections">#3 - Refactor To Collections</h2>

<p>In PHP, we work a lot with arrays of different data. The available features to handle and transform those arrays are quite limited in PHP and don't provide a good experience. (array_walk, usort, etc.)</p>

<p>To tackle this problem, there is this concept of Collection classes, which help you handle arrays. Most known is the <a href="https://laravel.com/docs/master/collections">implementation in Laravel</a>, where a collection class provides you with dozens of useful features to work with arrays.</p>

<div class="blognote"><strong>Note:</strong> For the following examples, I will use Laravel's collect() helper, but the approach is very similar with other available collection classes from other frameworks or libraries.</div>

<h3>Example #1</h3>
<x-code-tab code-name="collections-example-1"></x-code-tab>

<h3>Example #2</h3>
<x-code-tab code-name="collections-example-2"></x-code-tab>

<div class="blognote"><strong>Note:</strong> Adam Wathan wrote a <a href="https://adamwathan.me/refactoring-to-collections/">book</a>
 about how to use collections to never write a loop again which I can highly recommend.</div>

<h2 id="consistency">#4 - Consistency</h2>

<p>Every line of code adds a little amount of visual noise. The more code, the more difficult it gets to read. This is why it is essential to set rules. Keeping similar things consistent will help you recognize code and patterns. It will result in less noise and more readable code.</p>

<h3>Example #1</h3>
<x-code-tab code-name="consistency-example-2"></x-code-tab>

<h3>Example #2</h3>
<x-code-tab code-name="consistency-example-1"></x-code-tab>




<h2>Refactoring ❤️ Tests</h2>

<p>I already mentioned that refactoring doesn't change the functionality of your code. This comes handy when running tests, because they should work after refactoring too. This is why I only start to refactor my code, when there are tests. They will assure that I don't unintentionally change the behaviour of my code. So don't forget to write tests or even go TDD.</p>

<h2>Conclusion</h2>

<p>This is how I refactor PHP. In the end, you and your team have to decide how you want your code to be. Just make sure to define it, write it down, and save enough time to make it happen after your code is working. I started with my main principles and I plan to cover more topics soon. If you have refactoring tips you'd like to share, just ping me on <a href="https://twitter.com/christophrumpel">Twitter</a>.</p>
