

<style>

    /*=============================================================================
    LOADER
    ===============================================================================*/
    .cont-loader {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        top: calc(50% - 50px);
        left: calc(50% - 50px);
        width: 100px; /* Full width */
        height: 100px; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
        white-space: wrap;
        border-radius: 20px;
        overflow: hidden;
    }
    #loader, .loader {
        position: absolute;
        right:  calc(50% - 30px);
        top: 200px ;
        z-index: 11;
        margin: -75px 0 0 -75px;
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 60px;
        height: 60px;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
    }

    .cont-loader .loader{
        top: 95px ;
    }
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>



<div class="cont-loader">
    <div class="loader"></div>
</div>