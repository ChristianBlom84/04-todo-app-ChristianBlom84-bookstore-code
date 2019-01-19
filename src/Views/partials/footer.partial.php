        <form class="footerstart" action="/" method="GET">
            <button class="btn green" type="submit" formaction="done">Show done</button>
            <button class="btn yellow" type="submit" formaction="in-progress">Show in progress</button>
            <button class="btn" type="submit">Show all</button>
        </form>
        <form action="toggle-all" method="POST">
            <button class="btn yellow" type="submit" name="toggle-all">Toggle All</button>
            <button class="btn red" type="submit" name="delete-completed" formaction="delete-completed">Clear Completed</button>
        </form>
        <form action="search" method="POST">
            <input type="text" name="search">
            <button class="btn" type="submit">Search</button>
        </form>
    </section>
    </main>
    <footer role="contentinfo">
        <p>© Christian Blom LLC. (No rights reserved what so ever)</p>
    </footer>
</body>
</html>