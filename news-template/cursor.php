<div id="cursor">
    <div class="cursor-inner"></div>
</div>

<style>
    #cursor {
        width: 3rem;
        height: 3rem;
        position: fixed;
        top: 0;
        left: 0;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        border-color: red;
        pointer-events: none;
        box-shadow: 0 0 20px rgba(255, 165, 0, 0.6);
    }

    .cursor-inner {
        width: 0.5rem;
        height: .5rem;
        background: var(--black);
        border: var(--border);

        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        opacity: 0.5;
        transform: translate(-50%, -50%);
      
        transition: transform 0.2s, background-color 0.2s;
    }

    /* Add some additional styles for a modern cursor effect */
    button,a:hover #cursor {
        /* Change cursor color on hover */
        cursor: none;
        background: transparent;
    }

    .hoverable {
        /* Elements with this class will have the cursor effect */
        position: relative;
    }

    .hoverable:hover .cursor-inner {
        transform: translate(-50%, -50%) scale(1.5); /* Scale up on hover */
        background-color: blue; /* Change color on hover */
    }
</style>




<script>
    var cursor = document.getElementById("cursor");
    document.addEventListener("mousemove", function(e) {
        var x = e.clientX;
        var y = e.clientY;
        cursor.style.top = y + "px";
        cursor.style.left = x + "px";
    });
</script>



