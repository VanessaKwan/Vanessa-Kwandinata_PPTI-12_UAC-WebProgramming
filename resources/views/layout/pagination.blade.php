
<div class="pagination flex flex-col ml-[65vw] mt-[-6vw] items-center">
{{-- <div class="pagination flex flex-col items-center w-[20vw] right-[8vw] top-[37.5vw] fixed"> --}}
    <!-- Help text -->
    <span class="text-sm text-black dark:text-gray-400">
        Showing <span class="font-semibold text-black dark:text-white">{{ $paginator->firstItem() }}</span> to <span class="font-semibold text-black dark:text-white">{{ $paginator->lastItem() }}</span> of <span class="font-semibold text-black dark:text-white">{{ $paginator->total() }}</span> Entries
    </span>
    <div class="inline-flex mt-2 xs:mt-0">
      <!-- Buttons -->
      <a href="{{ $paginator->previousPageUrl() }}">
        <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
            <p>Prev</p>
        </button>
      </a>
      <a href="{{ $paginator->nextPageUrl() }}">
          <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <p>Next</p>
              <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
      </a>
    </div>
  </div>
