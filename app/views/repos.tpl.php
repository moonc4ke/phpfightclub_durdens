<section class="repos">
    <?php if (isset($view['h1'])): ?>
        <h1><?php print $view['h1']; ?></h1>
        <img src="<?php print $view['image']['src']; ?>" class="responsive" alt="<?php print $view['image']['alt']; ?>">
        <h2>Add a New Repository</h2>
    <?php endif; ?>
    <?php if (!empty($view['repo_dirs'])): ?>
        <h2>Existing Repositories</h2>
        <table id="repo_table" border=1 cellpadding=5 cellspacing=0>
            <tr>
                <th onclick="w3.sortHTML('#repo_table', '.item', 'td:nth-child(1)')" class="description">
                    Author__Repository-Name
                </th>
            </tr>
            <!-- loop through the array of files and print them all -->
            <?php foreach ($view['repo_dirs'] as $repo_dir): ?>
                <tr class="item">
                    <td>
                        <div class="txt">
                            <a class="dont-break-out" href="<?php print $view['directory'] . $repo_dir; ?>"
                               target="_blank">
                                <?php print $repo_dir; ?>
                            </a>
                        </div>
                    </td>
                    <td class="buttons">
                        <form action="<?php print $view['delete']; ?>" method="post">
                            <input type="hidden" name="deletion" value="<?php print $repo_dir; ?>">
                            <div>
                                <input class="btn btn-dark" type="submit" value="Delete">
                            </div>
                        </form>
                        <form action="<?php print $view['update']; ?>" method="post">
                            <input type="hidden" name="update" value="<?php print $repo_dir; ?>">
                            <div>
                                <input class="btn btn-dark" type="submit" value="Update">
                            </div>
                        </form>
                        <form target="_blank" action="<?php print $view['github_link']; ?>" method="post">
                            <input type="hidden" name="github" value="<?php print $repo_dir; ?>">
                            <div>
                                <input class="btn btn-dark" type="submit" value="GitHub">
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</section>