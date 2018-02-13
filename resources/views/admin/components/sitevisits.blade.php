<!-- #Site Visits ==================== -->
<div class="bd bgc-white">
    <div class="peers fxw-nw@lg+ ai-s">
        <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
            <div class="layers">
                <div class="layer w-100 mB-10">
                    <h6 class="lh-1">Site Visits</h6>
                </div>
                <div class="layer w-100">
                    <div id="world-map-marker"></div>
                </div>
            </div>
        </div>
        <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
            <div class="layers">
                <div class="layer w-100">
                    <!-- Progress Bars -->
                    @include('admin.components.progressbars')

                    <!-- Pie Charts -->
                    @include('admin.components.piecharts')
                </div>
            </div>
        </div>
    </div>
</div>