<style>
    .developer-signature {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        margin-top: 8px;
        color: #e66239;
        background: rgba(230, 98, 57, 0.08);
        border: 1px solid rgba(230, 98, 57, 0.2);
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .developer-signature:hover {
        color: #fff;
        background: #e66239;
        border-color: #e66239;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(230, 98, 57, 0.2);
    }

    .developer-signature-name {
        font-weight: 600;
        letter-spacing: 1px;
    }
</style>

<div class="row">

    <div class="col-12">

        <footer class="text-center py-4 mt-6 text-secondary">

            <p class="small mb-1">
                Copyright © {{ date('Y') }} Gestionnaire de tâches.
            </p>

            <p class="small mb-0">
                Conçu et développé par
            </p>

            <a href="https://yassineyounes.com/"
               target="_blank"
               rel="noopener noreferrer"
               class="developer-signature">

                <i class="ti ti-code fs-5"></i>

                <span class="developer-signature-name">
                    YASSINE YOUNES
                </span>

                <i class="ti ti-external-link"></i>

            </a>

        </footer>

    </div>

</div>





  {{-- <div class="row">
         <div class="col-12">
             <footer class="text-center py-2 mt-6 text-secondary ">
                 <p class="mb-0">Copyright © 2026 Gestionnaire de tâches. Développé par : <br>
                     <a href="https://yassineyounes.com/" target="_blank" class="text-primary">
                        
                           
                             
                              
                              
                                ▌║█║▌│║▌│║▌║▌█║  YASSINE Younes ▌│║▌║▌│║║▌█║▌║█
                     </a>
                 </p>
             </footer>
         </div>




     </div>   --}}
