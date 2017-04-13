<? php $this->layout('layout', ['title' => 'Output - TEXT', 'currentPage' => 'output']) ?>

<? php $this->start('main_content') ?>

<p>
    <strong><a href=""title="home">output</a> - </strong>
</p>

<h2>output text</h2>

<table class='table'>
    <thead>
        <tr>
            <th>Process</th>
            <th>Task</th>            
            <th>Typologie</th>               
            <th>Name</th>
            <th>Value</th>            
            <th>Repetition</th>

            <th>Wastage</th>
            <th>Hardship</th>            
            <th>Observations</th>               
            <th>Remarks</th>
            <th>Started</th>            
            <th>Stopped</th>

            <th>Total time</th>               
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i < 25; $i++): ?>

            <tr>
                <!--Process-->
                <td>ewqrqewr</td>
                <!--Task-->
                <td>qwrqwer</td>
                <!--Typologie-->
                <td>qwerqw</td>
                <!--Name-->
                <td>wqreqwer</td>
                <!--Value--> 
                <td>qwerqwe</td>
                <!--Repetition-->
                <td>werqwer</td>

                <!--Wastage-->
                <td>312412</td>
                <!--Hardship-->
                <td>1234</td>
                <!--Observations-->
                <td>214</td>
                <!--Remarks-->
                <td>1234</td>
                <!--Started-->
                <td>2134</td>
                <!--Stopped--> 
                <td>2134</td>

                <!--Total time-->
                <td>214</td>

            </tr>
        <?php endfor; ?>
    </tbody>
</table>


<h2>output text</h2>

<table class='table'>
    <thead>
        <tr>
            <th>Values NVA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>sum VA</td>
            <td>60</td>
        </tr>
        <tr>
            <td>sum NVA</td>
            <td>40</td>
        </tr>                
        <tr>
            <td>sum NVA</td>
            <td>15</td>
        </tr>
        <tr>
            <td>sum NVA-U</td>
            <td>25</td>
        </tr>         
    </tbody>
</table>